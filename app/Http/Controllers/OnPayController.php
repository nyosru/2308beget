<?php

namespace App\Http\Controllers;

use App\Http\Requests\OnPayRequest;
use App\Models\DomainOrder;
use Illuminate\Http\Request;

class OnPayController extends Controller
{

    public static $merchant_login = '';
    public static $linkPaySystem = 'http://secure.onpay.ru/pay/';
    public static $apiSercetKey = 'CEcLNBkdmQt';


    static function toFloat($sum)
    {
        $sum = floatval($sum);
        if (strpos($sum, ".")) {
            $sum = round($sum, 2);
        } else {
            $sum = $sum . ".0";
        }
        return $sum;
    }


    public function apiCall(Request $request)
    {




        TelegramController::$token_telega = '776541435:AAH6efi0QRgzmifygi5bqih2m34XNjf8_As';
//        TelegramController::sendMsg(360209578,'asdasd');

        TelegramController::sendMsg(360209578, 'старт платежа/проверки'.PHP_EOL.json_encode(["request" => $request->all()]));





        $rqst = self::GetData();

        TelegramController::sendMsg(360209578, '$rqst: '. json_encode($rqst));

        if($rqst['type'] == 'check') {
            $psObj = new COnpayPaymentV2();
            $psObj->CheckAction($rqst);
        } elseif($rqst['type'] == 'pay') {
            $psObj = new COnpayPaymentV2();
            $psObj->PayAction($rqst);
        } elseif($_REQUEST['type'] == 'check') {
            $psObj = new COnpayPayment();
            $psObj->CheckAction($_REQUEST);
        } elseif($_REQUEST['type'] == 'pay') {
            $psObj = new COnpayPayment();
            $psObj->PayAction($_POST);
        } else {
            COnpayPayment::SaveLog(array_merge($_REQUEST, array('INPUT.REQUEST' => $rqst)));
        }














        $out = [
//            "status" => $result,
            "pay_for" => $request->pay_for,
        ];

        if (self::checkMd5($request)) {

            $out['md5_check'] = true;

            try {

                $res = DomainOrder::with('price')->whereId($request->pay_for)->firstOrFail();

                $result = true;

                if ($res->price->amount != $request->amount) {
                    $result = false;
                }

                $err = '';
            } catch (\Exception $ex) {
                $err = $ex;
//            dd($ex);
                $result = false;
            }

        }
        // no check md5
        else{
            $out['md5_check'] =
            $result = false;
        }

        $out["status"] = $result;

        $check = [
            'check',
            $result ? 'true' : 'false',
            (int)$request->pay_for,
            self::$apiSercetKey
        ];
        $signature_string = implode(";", $check);
        $out['signature'] = sha1($signature_string);

//        TelegramController::sendMsg(360209578, json_encode($out));

        return response()->json($out);
    }

    static function checkMd5(Request $request): bool
    {

        $tomd5 = [
            $request->type,
            $request->pay_for,
            $request->amount,
            $request->way,
            $request->mode,
            self::$apiSercetKey
        ];

        $sha = sha1(implode(';', $tomd5));
        $ee = ( $request->signature == $sha ) ? true : false;

//        TelegramController::sendMsg(360209578, '$tomd5 '. $ee );
        TelegramController::sendMsg(360209578, 'sig: '.$request->signature
            . PHP_EOL . 'sha: '.$sha );
//        TelegramController::sendMsg(360209578, json_encode(['$tomd5' => $tomd5, 'sha' => $sha, 'res' => $ee ]));
//        TelegramController::sendMsg(360209578, json_encode(['$tomd5' => $tomd5, 'sha' => $sha, 'res' => $ee ]));

        return $ee;
    }

    public static function creatLink($in)
    {
//        //pay_mode 	«free» или «fix» 	Режим платежа. free – пользователь сможет менять сумму платежа в платежной форме, fix – пользователю будет показана сумма к зачислению (т.е. за вычетом всех комиссий) без возможности её редактирования. Обязательно указать сумму платежа price и назначение pay_for
//        $pay_mode = '',
//        //price 	Дробное число, до 2-х знаков после запятой. 	Сумма платежа. Внимание! При формировании контрольной подписи число содержит не менее 1-го знака после запятой. Т.е. «100» в подписи будет «100.0», а не «100». Внимание! Все суммы в платежках и платежах округляются вниз до 2-ух знаков после запятой. Т.е., число «100.1155» будет округлено до «100.11».
//        $price = '',
//        //ticker 	3-х символьное наименование валюты (по умолчанию RUR) 	Основная валюта ценника.
//        $ticker = '',
//        //pay_for 	String (100max) (Для «прямых» платежей можно использовать только цифры!) 	Номер заказа, заявки, аккаунт пользователя и т.п. для идентификации платежа в системе магазина.
//        $pay_for = '',
//        //md5 	string(32) 	Подпись параметров ссылки, для защиты от изменений пользователем. Принцип формирования см. ниже.
//        $md5 = '',
//        //convert 	«yes» или «no» (по умолчанию «yes») 	Принудительная конвертация платежей в валюту ценника. Если включена – все поступающие платежи будут конвертироваться в валюту ценника. Т.е. если в ссылке установлена стоимость 100RUR, а клиент оплатил с помощью USD – вы получите на счет 100RUR. Если выключена, вы получите ту валюту, которой платит клиент. Т.е. например, пользователь платит 3.5WMZ за ваш товар стоимостью 100RUR – вы получите 3.5WMZ на свой WMZ счет в системе Onpay (при этом уведомление по API будет содержать 100RUR). ВНИМАНИЕ! Если оплата поступает из НЕбалансовой системы(система, не имеющая собственного баланса, пример - OSP), то конвертация будет происходить в валюту ценника.
//        $convert = '',
//        //url_success 	http:* / https:* (255max) 	Ссылка, на которую будет переадресован пользователь после успешного завершения платежа. Внимание! Не может содержать параметры запроса (все, что идет после «?» в ссылке). Если Вам нужны параметры после «?» в ссылке используйте url_success_enc.
//        $url_success = '',
//        //url_success_enc 	http:* / https:* (255max)
// Необязательный параметр, содержащий ссылку для перехода в случае успешного платежа,
// закодированную в base64. Параметр url_success_enc имеет приоритет над параметром url_success
// в том смысле, что если в ссылке будут присутствовать оба параметра,
// параметр url_success будет проигнорирован. Если в ссылке присутствует только параметр
// url_success, а параметра url_success_enc - нет, то будет использован параметр url_success,
// но по техническим причинам он будет обрезан справа начиная с первого встретившегося
// символа '&'.
//        $url_success_enc = '',
//        //url_fail 	http:* / https:* (255max) 	Ссылка, на которую будет
// переадресован пользователь после неудачного завершения платежа. Внимание!
// Не может содержать параметры запроса (все, что идет после «?» в ссылке).
// Если Вам нужны параметры после «?» в ссылке используйте url_fail_enc.
//        $url_fail = '',
//        //url_fail_enc 	http:* / https:* (255max) 	Необязательный параметр, содержащий ссылку для перехода в случае неудачного или отмененного платежа, закодированную в base64. Параметр url_fail_enc имеет приоритет над параметром url_fail в том смысле, что если в ссылке будут присутствовать оба параметра, параметр url_fail будет проигнорирован. Если в ссылке присутствует только параметр url_fail, а параметра url_fail_enc - нет, то будет использован параметр url_fail, но по техническим причинам он будет обрезан справа начиная с первого встретившегося символа '&'.
//        $url_fail_enc = '',
//        //user_email 	String (40max) 	E-mail плательщика
//        $user_email = '',
//        //user_phone 	String (40max) 	Телефон плательщика
//        $user_phone = '',
//        //note 	String (255max) 	Заметка. В этом параметре можно передать
// любой комментарий, который будет передан через API вашему сайту при поступлении
// платежа (в запросе типа PAY)
//        $note = '',
//        //ln 	«en» или «ru»(по умолчанию «ru») 	Язык отображения платежной формы
//        $ln = '',
//        //f 	7, 8, 9, 10, 11 	Вариант дизайна платежной формы
//        $f = '',
//        //one_way 	3-х символьное наименование валюты 	Формы
// оплаты одним способом (выбрана валюта и сумма платежа, для ввода
// доступен только e-mail пользователя) Для использования форм с
// выбранной платежной системой в ссылку необходимо передать
// параметры: one_way - валюта, отличная от RUR,
// pay_mode - «fix», pay_for - номер заказа,
// price - цена, ticker - RUR
//        $one_way = '',
//        //price_final 	«true» 	Комиссию платежной системы взымать с продавца.
// К стоимости заказа не будет прибавляться комиссия платежной системы на ввод.
// Если параметр не указан, или в нем передано значение отличное от «true»,
// то комиссия будет взыматься с плательщика
//        $price_final = '',
//        //onpay_ap_xxx 	string 	Дополнительные параметры
//        $onpay_ap_xxx = '')
//    {


        $link = self::$linkPaySystem . self::$merchant_login . '?' . http_build_query($in);

        //return $in;
        return $link;
    }



    //pay_mode 	«free» или «fix» 	Режим платежа. free – пользователь сможет менять сумму платежа в платежной форме, fix – пользователю будет показана сумма к зачислению (т.е. за вычетом всех комиссий) без возможности её редактирования. Обязательно указать сумму платежа price и назначение pay_for
    //price 	Дробное число, до 2-х знаков после запятой. 	Сумма платежа. Внимание! При формировании контрольной подписи число содержит не менее 1-го знака после запятой. Т.е. «100» в подписи будет «100.0», а не «100». Внимание! Все суммы в платежках и платежах округляются вниз до 2-ух знаков после запятой. Т.е., число «100.1155» будет округлено до «100.11».
    //ticker 	3-х символьное наименование валюты (по умолчанию RUR) 	Основная валюта ценника.
    //pay_for 	String (100max) (Для «прямых» платежей можно использовать только цифры!) 	Номер заказа, заявки, аккаунт пользователя и т.п. для идентификации платежа в системе магазина.
    //md5 	string(32) 	Подпись параметров ссылки, для защиты от изменений пользователем. Принцип формирования см. ниже.
    //convert 	«yes» или «no» (по умолчанию «yes») 	Принудительная конвертация платежей в валюту ценника. Если включена – все поступающие платежи будут конвертироваться в валюту ценника. Т.е. если в ссылке установлена стоимость 100RUR, а клиент оплатил с помощью USD – вы получите на счет 100RUR. Если выключена, вы получите ту валюту, которой платит клиент. Т.е. например, пользователь платит 3.5WMZ за ваш товар стоимостью 100RUR – вы получите 3.5WMZ на свой WMZ счет в системе Onpay (при этом уведомление по API будет содержать 100RUR). ВНИМАНИЕ! Если оплата поступает из НЕбалансовой системы(система, не имеющая собственного баланса, пример - OSP), то конвертация будет происходить в валюту ценника.
    //url_success 	http:* / https:* (255max) 	Ссылка, на которую будет переадресован пользователь после успешного завершения платежа. Внимание! Не может содержать параметры запроса (все, что идет после «?» в ссылке). Если Вам нужны параметры после «?» в ссылке используйте url_success_enc.
    //url_success_enc 	http:* / https:* (255max) 	Необязательный параметр, содержащий ссылку для перехода в случае успешного платежа, закодированную в base64. Параметр url_success_enc имеет приоритет над параметром url_success в том смысле, что если в ссылке будут присутствовать оба параметра, параметр url_success будет проигнорирован. Если в ссылке присутствует только параметр url_success, а параметра url_success_enc - нет, то будет использован параметр url_success, но по техническим причинам он будет обрезан справа начиная с первого встретившегося символа '&'.
    //url_fail 	http:* / https:* (255max) 	Ссылка, на которую будет переадресован пользователь после неудачного завершения платежа. Внимание! Не может содержать параметры запроса (все, что идет после «?» в ссылке). Если Вам нужны параметры после «?» в ссылке используйте url_fail_enc.
    //url_fail_enc 	http:* / https:* (255max) 	Необязательный параметр, содержащий ссылку для перехода в случае неудачного или отмененного платежа, закодированную в base64. Параметр url_fail_enc имеет приоритет над параметром url_fail в том смысле, что если в ссылке будут присутствовать оба параметра, параметр url_fail будет проигнорирован. Если в ссылке присутствует только параметр url_fail, а параметра url_fail_enc - нет, то будет использован параметр url_fail, но по техническим причинам он будет обрезан справа начиная с первого встретившегося символа '&'.
    //user_email 	String (40max) 	E-mail плательщика
    //user_phone 	String (40max) 	Телефон плательщика
    //note 	String (255max) 	Заметка. В этом параметре можно передать любой комментарий, который будет передан через API вашему сайту при поступлении платежа (в запросе типа PAY)
    //ln 	«en» или «ru»(по умолчанию «ru») 	Язык отображения платежной формы
    //f 	7, 8, 9, 10, 11 	Вариант дизайна платежной формы
    //one_way 	3-х символьное наименование валюты 	Формы оплаты одним способом (выбрана валюта и сумма платежа, для ввода доступен только e-mail пользователя) Для использования форм с выбранной платежной системой в ссылку необходимо передать параметры: one_way - валюта, отличная от RUR, pay_mode - «fix», pay_for - номер заказа, price - цена, ticker - RUR
    //price_final 	«true» 	Комиссию платежной системы взымать с продавца. К стоимости заказа не будет прибавляться комиссия платежной системы на ввод. Если параметр не указан, или в нем передано значение отличное от «true», то комиссия будет взыматься с плательщика
    //onpay_ap_xxx 	string 	Дополнительные параметры

    public function createPayLink($in)
    {

//        $validated = $in->validated();
//        dd($validated);

        $validated = $in->validate([
            //pay_mode 	«free» или «fix» 	Режим платежа. free – пользователь сможет менять сумму платежа в платежной форме, fix – пользователю будет показана сумма к зачислению (т.е. за вычетом всех комиссий) без возможности её редактирования. Обязательно указать сумму платежа price и назначение pay_for
            'pay_mode' => 'in:free,fix',
            //price 	Дробное число, до 2-х знаков после запятой. 	Сумма платежа. Внимание! При формировании контрольной подписи число содержит не менее 1-го знака после запятой. Т.е. «100» в подписи будет «100.0», а не «100». Внимание! Все суммы в платежках и платежах округляются вниз до 2-ух знаков после запятой. Т.е., число «100.1155» будет округлено до «100.11».
            'price' => 'required|numeric',
            //ticker 	3-х символьное наименование валюты (по умолчанию RUR) 	Основная валюта ценника.
            'ticker' => 'string|max:3',
            //pay_for 	String (100max) (Для «прямых» платежей можно использовать только цифры!) 	Номер заказа, заявки, аккаунт пользователя и т.п. для идентификации платежа в системе магазина.
            'pay_for' => 'required|integer|max:100',
            //md5 	string(32) 	Подпись параметров ссылки, для защиты от изменений пользователем. Принцип формирования см. ниже.
            'md5' => 'max:32',
            //convert 	«yes» или «no» (по умолчанию «yes») 	Принудительная конвертация платежей в валюту ценника. Если включена – все поступающие платежи будут конвертироваться в валюту ценника. Т.е. если в ссылке установлена стоимость 100RUR, а клиент оплатил с помощью USD – вы получите на счет 100RUR. Если выключена, вы получите ту валюту, которой платит клиент. Т.е. например, пользователь платит 3.5WMZ за ваш товар стоимостью 100RUR – вы получите 3.5WMZ на свой WMZ счет в системе Onpay (при этом уведомление по API будет содержать 100RUR). ВНИМАНИЕ! Если оплата поступает из НЕбалансовой системы(система, не имеющая собственного баланса, пример - OSP), то конвертация будет происходить в валюту ценника.
            'convert' => 'in:yes,no',
            //url_success 	http:* / https:* (255max) 	Ссылка, на которую будет переадресован пользователь после успешного завершения платежа. Внимание! Не может содержать параметры запроса (все, что идет после «?» в ссылке). Если Вам нужны параметры после «?» в ссылке используйте url_success_enc.
            'url_success' => 'max:255',
            //url_success_enc 	http:* / https:* (255max) 	Необязательный параметр, содержащий ссылку для перехода в случае успешного платежа, закодированную в base64. Параметр url_success_enc имеет приоритет над параметром url_success в том смысле, что если в ссылке будут присутствовать оба параметра, параметр url_success будет проигнорирован. Если в ссылке присутствует только параметр url_success, а параметра url_success_enc - нет, то будет использован параметр url_success, но по техническим причинам он будет обрезан справа начиная с первого встретившегося символа '&'.
            'url_success_enc' => 'max:255',
            //url_fail 	http:* / https:* (255max) 	Ссылка, на которую будет переадресован пользователь после неудачного завершения платежа. Внимание! Не может содержать параметры запроса (все, что идет после «?» в ссылке). Если Вам нужны параметры после «?» в ссылке используйте url_fail_enc.
            'url_fail' => 'max:255',
            //url_fail_enc 	http:* / https:* (255max) 	Необязательный параметр, содержащий ссылку для перехода в случае неудачного или отмененного платежа, закодированную в base64. Параметр url_fail_enc имеет приоритет над параметром url_fail в том смысле, что если в ссылке будут присутствовать оба параметра, параметр url_fail будет проигнорирован. Если в ссылке присутствует только параметр url_fail, а параметра url_fail_enc - нет, то будет использован параметр url_fail, но по техническим причинам он будет обрезан справа начиная с первого встретившегося символа '&'.
            'url_fail_enc' => 'max:255',
            //user_email 	String (40max) 	E-mail плательщика
            'user_email' => 'max:40',
            //user_phone 	String (40max) 	Телефон плательщика
            'user_phone' => 'max:40',
            //note 	String (255max) 	Заметка. В этом параметре можно передать любой комментарий, который будет передан через API вашему сайту при поступлении платежа (в запросе типа PAY)
            'note' => 'max:255',
            //ln 	«en» или «ru»(по умолчанию «ru») 	Язык отображения платежной формы
            'ln' => 'in:en,ru',
            //f 	7, 8, 9, 10, 11 	Вариант дизайна платежной формы
            'f' => '',
            //one_way 	3-х символьное наименование валюты 	Формы оплаты одним способом (выбрана валюта и сумма платежа, для ввода доступен только e-mail пользователя) Для использования форм с выбранной платежной системой в ссылку необходимо передать параметры: one_way - валюта, отличная от RUR, pay_mode - «fix», pay_for - номер заказа, price - цена, ticker - RUR
            'one_way' => 'max:3',
            //price_final 	«true» 	Комиссию платежной системы взымать с продавца. К стоимости заказа не будет прибавляться комиссия платежной системы на ввод. Если параметр не указан, или в нем передано значение отличное от «true», то комиссия будет взыматься с плательщика
            'price_final' => 'in:true,false',
            //onpay_ap_xxx 	string 	Дополнительные параметры
            'onpay_ap_xxx' => '',
        ]);

        dd($validated);

//        dd($request);

        //pay_mode 	«free» или «fix» 	Режим платежа. free – пользователь сможет менять сумму платежа в платежной форме, fix – пользователю будет показана сумма к зачислению (т.е. за вычетом всех комиссий) без возможности её редактирования. Обязательно указать сумму платежа price и назначение pay_for
        if (isset($in['pay_mode']) && $in['pay_mode'] == 'free') {
        } else {
            $in['pay_mode'] == 'fix';
        }

        //price 	Дробное число, до 2-х знаков после запятой. 	Сумма платежа. Внимание! При формировании контрольной подписи число содержит не менее 1-го знака после запятой. Т.е. «100» в подписи будет «100.0», а не «100». Внимание! Все суммы в платежках и платежах округляются вниз до 2-ух знаков после запятой. Т.е., число «100.1155» будет округлено до «100.11».
        //ticker 	3-х символьное наименование валюты (по умолчанию RUR) 	Основная валюта ценника.
        //pay_for 	String (100max) (Для «прямых» платежей можно использовать только цифры!) 	Номер заказа, заявки, аккаунт пользователя и т.п. для идентификации платежа в системе магазина.
        //md5 	string(32) 	Подпись параметров ссылки, для защиты от изменений пользователем. Принцип формирования см. ниже.
        //convert 	«yes» или «no» (по умолчанию «yes») 	Принудительная конвертация платежей в валюту ценника. Если включена – все поступающие платежи будут конвертироваться в валюту ценника. Т.е. если в ссылке установлена стоимость 100RUR, а клиент оплатил с помощью USD – вы получите на счет 100RUR. Если выключена, вы получите ту валюту, которой платит клиент. Т.е. например, пользователь платит 3.5WMZ за ваш товар стоимостью 100RUR – вы получите 3.5WMZ на свой WMZ счет в системе Onpay (при этом уведомление по API будет содержать 100RUR). ВНИМАНИЕ! Если оплата поступает из НЕбалансовой системы(система, не имеющая собственного баланса, пример - OSP), то конвертация будет происходить в валюту ценника.
        //url_success 	http:* / https:* (255max) 	Ссылка, на которую будет переадресован пользователь после успешного завершения платежа. Внимание! Не может содержать параметры запроса (все, что идет после «?» в ссылке). Если Вам нужны параметры после «?» в ссылке используйте url_success_enc.
        //url_success_enc 	http:* / https:* (255max) 	Необязательный параметр, содержащий ссылку для перехода в случае успешного платежа, закодированную в base64. Параметр url_success_enc имеет приоритет над параметром url_success в том смысле, что если в ссылке будут присутствовать оба параметра, параметр url_success будет проигнорирован. Если в ссылке присутствует только параметр url_success, а параметра url_success_enc - нет, то будет использован параметр url_success, но по техническим причинам он будет обрезан справа начиная с первого встретившегося символа '&'.
        //url_fail 	http:* / https:* (255max) 	Ссылка, на которую будет переадресован пользователь после неудачного завершения платежа. Внимание! Не может содержать параметры запроса (все, что идет после «?» в ссылке). Если Вам нужны параметры после «?» в ссылке используйте url_fail_enc.
        //url_fail_enc 	http:* / https:* (255max) 	Необязательный параметр, содержащий ссылку для перехода в случае неудачного или отмененного платежа, закодированную в base64. Параметр url_fail_enc имеет приоритет над параметром url_fail в том смысле, что если в ссылке будут присутствовать оба параметра, параметр url_fail будет проигнорирован. Если в ссылке присутствует только параметр url_fail, а параметра url_fail_enc - нет, то будет использован параметр url_fail, но по техническим причинам он будет обрезан справа начиная с первого встретившегося символа '&'.
        //user_email 	String (40max) 	E-mail плательщика
        //user_phone 	String (40max) 	Телефон плательщика
        //note 	String (255max) 	Заметка. В этом параметре можно передать любой комментарий, который будет передан через API вашему сайту при поступлении платежа (в запросе типа PAY)
        //ln 	«en» или «ru»(по умолчанию «ru») 	Язык отображения платежной формы
        //f 	7, 8, 9, 10, 11 	Вариант дизайна платежной формы
        //one_way 	3-х символьное наименование валюты 	Формы оплаты одним способом (выбрана валюта и сумма платежа, для ввода доступен только e-mail пользователя) Для использования форм с выбранной платежной системой в ссылку необходимо передать параметры: one_way - валюта, отличная от RUR, pay_mode - «fix», pay_for - номер заказа, price - цена, ticker - RUR
        //price_final 	«true» 	Комиссию платежной системы взымать с продавца. К стоимости заказа не будет прибавляться комиссия платежной системы на ввод. Если параметр не указан, или в нем передано значение отличное от «true», то комиссия будет взыматься с плательщика
        //onpay_ap_xxx 	string 	Дополнительные параметры


    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }






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
