<?
class COnpayPayment {

	const summa		= 15;
	const period	= 172800;		// Время доступа, в секундах (60 секунд * 60 минут * 24 часа * 2 суток = 172800 секунд). Исчисляется от времени поступления оплаты за код доступа.
	const login		= 'demo_login';	// Ваше "Имя пользователя" (логин) в системе Onpay.ru
	const key		= 'demo_key';	// Ваш "Секретный пароль для API IN" в системе Onpay.ru
	const pay_url 	= "http://secure.onpay.ru/pay/";
	const pay_mode 	= "fix";
	const pay_convert 	= "yes";
	const pay_currency 	= "RUR";		// Валюта
	const pay_form_id = "7";

	const accessClose	= 0;
	const accessOpen	= 1;

	const db_host	= 'localhost';
	const db_user	= 'demo_user';
	const db_pass	= 'demo_pass';
	const db_name	= 'demo_db';
	const db_tabl	= 'smp_payments';

	const api2log	= false;


	static function toFloat($sum) {
		$sum = floatval($sum);
		if (strpos($sum, ".")) {
			$sum = round($sum, 2);
		} else {
			$sum = $sum.".0";
		}
		return $sum;
	}

	function OpenDB() {
		$ret = false;
		global $OnpayPaymentDB;
		if(empty($OnpayPaymentDB)) $OnpayPaymentDB = mysql_connect(self::db_host, self::db_user, self::db_pass);
		if(!empty($OnpayPaymentDB)) $ret = mysql_select_db(self::db_name, $OnpayPaymentDB);
		return $ret;
	}

	function CloseDB() {
		global $OnpayPaymentDB;
		if(!empty($OnpayPaymentDB)) mysql_close($OnpayPaymentDB);
		unset($OnpayPaymentDB);
	}

	function NewPayment(&$code, $summa, $path) {
		$ret = false;
		$summa = floatval($summa);
		$path = htmlspecialchars($path, ENT_QUOTES);
		$sql = "INSERT INTO ".self::db_tabl." SET path='{$path}', sum='{$summa}', payed=0, `date`=".time().", ip='{$_SERVER['REMOTE_ADDR']}';";
		$result = mysql_query($sql);	//Добавляем новую строку в базу данных
		if($result) { //Если сохранено в базу данных без ошибок
			$id = mysql_insert_id(); //Получаем id записи
			$code = $id.substr(time(), -7); //Создаем секретный код - соединяем уникальный номер строки в базе данных (id) и последние 7 знаков текущего времени в секундах (коды доступа не должны повторяться)
			$sql = "UPDATE ".self::db_tabl." SET code='{$code}' WHERE id='{$id}';"; //Запрос в базу данных, для добавления кода доступа
			$result = mysql_query($sql); //Сохраняем код в базу данных
			if($result) { //Если сохранено в базу данных без ошибок
				$sum_for_md5 = self::toFloat($summa);
				$pay_mode = self::pay_mode;
				$curr = self::pay_currency;
				$convert = self::pay_convert;
				$pay_mode = self::pay_mode;
				$key = self::key;
				$md5check = md5("{$pay_mode};{$sum_for_md5};{$curr};{$code};{$convert};{$key}"); //Создаем проверочную строку, которая защищает платежную ссылку от изменений
				$ret = self::pay_url.self::login."?f=".self::pay_form_id."&pay_mode={$pay_mode}&pay_for={$code}&price={$summa}&ticker={$curr}&convert={$convert}&md5={$md5check}&url_success=".urlencode($path); //Формируем платежную ссылку
			}
		}
		return $ret;
	}

	function CheckPayment($code, $path) {
		$ret = $arOrder = false;
		if(self::CheckOrderPayed($code, $arOrder)) {
			$ret = ($arOrder['path'] == htmlspecialchars($path, ENT_QUOTES) && intval($arOrder['date']) > time());
		}
		return $ret;
	}


	function SaveLog($data) {
		if(self::api2log) {
			$log_name = dirname(__FILE__)."/.api_log";
			if(!file_exists($log_name)) {
				mkdir($log_name);
				chmod($log_name, 0775);
			}
			$log_name .= "/".date('d').".log";
			$td = mktime(0, 0, 0, intval(date("m")), intval(date("d")), intval(date("Y")));
			$log_open = (file_exists($log_name) && filemtime($log_name) < $td) ? "w" : "a+";
			if($fh = fopen($log_name, $log_open)) {
				fwrite($fh, date("d.m.Y H:i:s")." ip:{$_SERVER['REMOTE_ADDR']} => http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."\n");
				if(is_array($data)) {
					$key = $data['key'] && in_array($data['type'], array('check', 'pay')) ? $data['key'] : false ;
					$str = serialize($data);
					if($key) {
						$str = str_replace($key, "#KEY#", $str);
					}
				} else {
					$str = $data;
				}
				fwrite($fh, $str."\n");
				fclose($fh);
				chmod($log_name, 0755);
			}
		}
	}

	function GetOrder($code) {
		$ret = false;
		$code = intval($code);
		if($code > 0) {
			$sql = "SELECT * FROM ".self::db_tabl." WHERE code='{$code}';";
			$result = mysql_query($sql);
			if($result && mysql_num_rows($result) == 1) {
				$ret = mysql_fetch_assoc($result);
			}
		}
		return $ret;
	}

	function _CheckOrderPayed($arOrder) {
		return ($arOrder['payed'] >= $arOrder['sum']);
	}

	function CheckOrderPayed($code, &$arOrder) {
		$ret = false;

		if($arOrder = self::GetOrder($code)) {
			$ret = self::_CheckOrderPayed($arOrder);
		}

		return $ret;
	}

	function PayOrder($id, $sum, $onpay_id) {
		$ret = false;
		$id = intval($id);
		$onpay_id = intval($onpay_id);
		$sum = floatval($sum);
		if($id > 0 && $sum > 0) {
			$result = mysql_query("UPDATE ".self::db_tabl." SET `date`='".(time()+self::period)."', payed=payed+'{$sum}', onpay_id='{$onpay_id}' WHERE id='{$id}';");
			$ret = !empty($result);
		}
		return $ret;
	}

	function _NeedSum2Pay($arOrder) {
		return floatval($arOrder['sum']) - floatval($arOrder['payed']);
	}

	function _CheckAction(&$request, $check) {
		$ret = false;
		if($this->_Validate($request, $check) && ($arOrder = self::GetOrder($request['ORDER_ID']))) {
			self::SaveLog($arOrder);
			if(!self::_CheckOrderPayed($arOrder) && self::_NeedSum2Pay($arOrder) <= $request['order_amount'] && self::pay_currency == $check['currency']) {
				$ret = true;
			}
		}
		return $ret;
	}

	function CheckAction($request) {
		self::SaveLog($request);
		$check = array(
			'type' => 'check',
			'pay_for' => intval($request['pay_for']),
			'amount' => self::toFloat($request['order_amount']),
			'currency' => trim($request['order_currency']),
			'resut_code' => 2,
			'key' => self::key,
			);
		$text = "Error order_id: {$check['pay_for']}";
		if($this->_CheckAction($request, $check)) {
			$check['resut_code'] = 0;
			$text = "OK";
		}
		$check['md5_string'] = implode(";", $check);
		$check['md5'] = strtoupper(md5($check['md5_string']));
		self::SaveLog($check);
		$out = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<result>
<code>{$check['resut_code']}</code>
<pay_for>{$check['pay_for']}</pay_for>
<comment>{$text}</comment>
<md5>{$check['md5']}</md5>
</result>";
		echo $out;
		self::SaveLog($out."\n\n");
	}

	function _PayAction($request, $pay) {
		$ret = false;

		if($this->_Validate($request, $pay)) {
			if($arOrder = self::GetOrder($request['ORDER_ID'])) {
				self::SaveLog($arOrder);
				if(!self::_CheckOrderPayed($arOrder) && self::_NeedSum2Pay($arOrder) <= $request['order_amount'] && self::pay_currency == $pay['currency']) {
					if(self::PayOrder($arOrder["id"], $request['order_amount'], $request['onpay_id'])) {
						$ret = true;
					}
				}
			}
		}

		return $ret;
	}

	function PayAction($request) {
		self::SaveLog($request);
		$_request = $request;
		$pay = array(
			'type' => 'pay',
			'pay_for' => intval($request['pay_for']),
			'onpay_id' => intval($request['onpay_id']),
			'amount' => self::toFloat($request['order_amount']),
			'currency' => trim($request['order_currency']),
			'key' => self::key,
			);
		$pay['md5_string'] = implode(";", $pay);
		$pay['md5'] = strtoupper(md5($pay['md5_string']));
		$payOut = array(
			'type' => 'pay',
			'pay_for' => intval($request['pay_for']),
			'onpay_id' => intval($request['onpay_id']),
			'order_id' => intval($request['pay_for']),
			'amount' => self::toFloat($request['order_amount']),
			'currency' => trim($request['order_currency']),
			'resut_code' => 3,
			'key' => self::key,
			);
		$text = "Error in parameters data";
		if($this->_PayAction($request, $pay)) {
			$payOut['resut_code'] = 0;
			$text = "OK";
		} else {
			$text = $request["error"];
		}
		$payOut['md5_string'] = implode(";", $payOut);
		$payOut['md5'] = strtoupper(md5($payOut['md5_string']));
		self::SaveLog($pay);
		self::SaveLog($payOut);
		$out = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<result>
<code>{$payOut['resut_code']}</code>
<comment>{$text}</comment>
<onpay_id>{$payOut['onpay_id']}</onpay_id>
<pay_for>{$payOut['pay_for']}</pay_for>
<order_id>{$payOut['order_id']}</order_id>
<md5>{$payOut['md5']}</md5>
</result>";
		echo $out;
		self::SaveLog($out."\n\n");
	}

	static function _Message($key) {
		$MESS = array(
			"ONPAY.SALE_MD5_WRONG" => "Md5 signature is wrong<br />",
			"ONPAY.SALE_ORDER_EMPTY" => "Не указан номер заказа<br />",
			"ONPAY.SALE_NOT_NUMERIC" => "Параметр не является числом<br />",
			"ONPAY.SALE_SUM_EMPTY" => "Не указана сумма<br />",
			"ONPAY.SALE_CURRENCY_EMPTY" => "Не указана валюта<br />",
			"ONPAY.SALE_CURRENCY_LONG" => "Параметр слишком длинный<br />",
			);
		return $MESS[$key];
	}

	static function _Validate(&$request, $check) {
		$request['ORDER_ID'] = intval($request['pay_for']);
		$request['order_amount'] = floatval($request['order_amount']);
		if($request['md5'] != $check['md5']) {
			$request['error'] .= self::_Message("ONPAY.SALE_MD5_WRONG");
		}
		if($request['type'] == 'check') {
			return ($request['ORDER_ID']>0);
		} elseif($request['type'] == 'pay') {
			$request['error'] = "";
			if (empty($request['onpay_id'])) {
				$request['error'] .= self::_Message("ONPAY.SALE_ORDER_EMPTY");
			} else {
				if (!is_numeric(intval($request['onpay_id']))) {
					$request['error'] .= self::_Message("ONPAY.SALE_NOT_NUMERIC");
				}
			}
			if (empty($request['order_amount'])) {
				$error .= self::_Message("ONPAY.SALE_SUM_EMPTY");
			} else {
				if (!is_numeric($request['order_amount'])) {
					$request['error'] .= self::_Message("ONPAY.SALE_NOT_NUMERIC");
				}
			}
			if (empty($request['balance_amount'])) {
				$request['error'] .= self::_Message("ONPAY.SALE_SUM_EMPTY");
			} else {
				if (!is_numeric(intval($request['balance_amount']))) {
					$request['error'] .= self::_Message("ONPAY.SALE_NOT_NUMERIC");
				}
			}
			if (empty($request['balance_currency'])) {
				$request['error'] .= self::_Message("ONPAY.SALE_CURRENCY_EMPTY");
			} else {
				if (strlen($request['balance_currency'])>4) {
					$request['error'] .= self::_Message("ONPAY.SALE_CURRENCY_LONG");
				}
			}
			if (empty($request['order_currency'])) {
				$request['error'] .= self::_Message("ONPAY.SALE_CURRENCY_EMPTY");
			} else {
				if (strlen($request['order_currency'])>4) {
					$request['error'] .= self::_Message("ONPAY.SALE_CURRENCY_LONG");
				}
			}
			if (empty($request['exchange_rate'])) {
				$request['error'] .= self::_Message("ONPAY.SALE_SUM_EMPTY");
			} else {
				if (!is_numeric($request['exchange_rate'])) {
					$request['error'] .= self::_Message("ONPAY.SALE_NOT_NUMERIC");
				}
			}
			return empty($request['error']);
		}
		return false;
	}
}


class COnpayPaymentV2 extends COnpayPayment {

	function GetData() {
		$ret = false;
		if(function_exists('json_decode')) {
			if(isset($GLOBALS['__inputData'])) {
				$ret = $GLOBALS['__inputData'];
			} elseif($hSource = fopen('php://input', 'r')) {
				$input = "";
				while (!feof($hSource)) {
					$input .= fread($hSource, 1024);
				}
				fclose($hSource);
				$input = trim($input);

				$ret = json_decode($input, true);
				if(is_null($ret)) $ret = json_decode($input, true);

				$GLOBALS['__inputData'] = $ret;
			}
		}
		return $ret;
	}

	function CheckAction($request) {
		$check = array(
			'type' => 'check',
			'pay_for' => intval($request['pay_for']),
			'amount' => self::toFloat($request['amount']),
			'currency' => trim($request['way']),
			'mode' => trim($request['mode']),
			'key' => self::key,
			);
		$check['signature_string'] = implode(";", $check);
		$check['signature'] = sha1($check['signature_string']);
		$checkOut = array(
			'type' => 'check',
			'status' => 'false',
			'pay_for' => intval($request['pay_for']),
			'key' => self::key,
			);
		if($this->_CheckAction($request, $check)) {
			$checkOut['status'] = 'true';
		}
		self::SaveLog($check);
		$this->_Response($checkOut, $request);
	}

	static function _ar2text($ar, $tbc=0) {
		$ret = "";
		$tb = str_repeat("\t", $tbc);
		if(is_array($ar)) foreach($ar as $key=>$val) {
			if(is_array($val)) {
				$ret .= $tb.$key."\n".self::_ar2text($val, $tbc+1);
			} else {
				$ret .= $tb.$key.":".$val.";\n";
			}
		}
		return $ret;
	}

	function PayAction($request) {
		$_request = $request;
		$pay = array(
			'type' => 'pay',

			'pay_for' => intval($request['pay_for']),
			'payment.amount' => self::toFloat($request['payment']['amount']),
			'payment.currency' => trim($request['payment']['way']),
			'amount' => self::toFloat($request['balance']['amount']),
			'currency' => trim($request['balance']['way']),
			'key' => self::key,
			);
		$pay['signature_string'] = implode(";", $pay);

		$pay['signature'] = sha1($pay['signature_string']);
		$payOut = array(
			'type' => 'pay',
			'status' => 'false',
			'pay_for' => intval($request['pay_for']),
			'key' => self::key,
			);
		if($this->_PayAction($request, $pay)) {
			$payOut['status'] = 'true';
		}
		self::SaveLog($pay);
		$this->_Response($payOut, $request);
	}

	static function _Response(&$response, $request) {
		if($request) {
			self::SaveLog($request);
		}
		$response['signature_string'] = implode(";", $response);
		$response['signature'] = sha1($response['signature_string']);
		$out = "{\"status\":{$response['status']},\"pay_for\":\"{$response['pay_for']}\",\"signature\":\"{$response['signature']}\"}";
		self::SaveLog($response);
		self::SaveLog($out."\n\n");

		header("Content-type: application/json; charset=utf-8");
		echo $out;
	}

	static function _Validate(&$request, $check) {
		$request['ORDER_ID'] = intval($request['pay_for']);
		if($request['signature'] != $check['signature']) {
			$request['error'] .= self::_Message("ONPAY.SALE_MD5_WRONG");
		}
		if($request['type'] == 'check') {

			$request['order_amount'] = floatval($request['amount']);
			$request['error'] = "";
			if($request['ORDER_ID'] <= 0) {
				$request['error'] .= self::_Message("ONPAY.SALE_ORDER_EMPTY");
			}

		} elseif($request['type'] == 'pay') {
			$request['order_amount'] = floatval($request['balance']['amount']);
			$request['onpay_id'] = intval($request['payment']['id']);
			$request['error'] = "";
			if (empty($request['payment']['id'])) {
				$request['error'] .= self::_Message("ONPAY.SALE_ORDER_EMPTY");
			} else {
				if (!is_numeric(intval($request['payment']['id']))) {
					$request['error'] .= self::_Message("ONPAY.SALE_NOT_NUMERIC");
				}
			}
			if (empty($request['payment']['amount'])) {
				$error .= self::_Message("ONPAY.SALE_SUM_EMPTY");
			} else {
				if (!is_numeric($request['payment']['amount'])) {
					$request['error'] .= self::_Message("ONPAY.SALE_NOT_NUMERIC");
				}
			}
			if (empty($request['balance']['amount'])) {
				$request['error'] .= self::_Message("ONPAY.SALE_SUM_EMPTY");
			} else {
				if (!is_numeric(intval($request['balance']['amount']))) {
					$request['error'] .= self::_Message("ONPAY.SALE_NOT_NUMERIC");
				}
			}
			if (empty($request['payment']['way'])) {
				$request['error'] .= self::_Message("ONPAY.SALE_CURRENCY_EMPTY");
			} else {
				if (strlen($request['payment']['way'])>4) {
					$request['error'] .= self::_Message("ONPAY.SALE_CURRENCY_LONG");
				}
			}
			if (empty($request['balance']['way'])) {
				$request['error'] .= self::_Message("ONPAY.SALE_CURRENCY_EMPTY");
			} else {
				if (strlen($request['balance']['way'])>4) {
					$request['error'] .= self::_Message("ONPAY.SALE_CURRENCY_LONG");
				}
			}
			if (empty($request['payment']['rate'])) {
				$request['error'] .= self::_Message("ONPAY.SALE_SUM_EMPTY");
			} else {
				if (!is_numeric($request['payment']['rate'])) {
					$request['error'] .= self::_Message("ONPAY.SALE_NOT_NUMERIC");
				}
			}
		} else {
			return false;
		}
		return empty($request['error']);
	}
}
