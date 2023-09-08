<?php

ob_start();

$index_page = "index.php";
$arPath = parse_url($_SERVER['REQUEST_URI']);
if(strlen($arPath['query']) > 0) {
	header("Location:".$arPath["path"]);
	exit;
}
if(substr($arPath["path"], -1) == "/" ) $arPath["path"] .= $index_page;
$file_path = $arPath["path"];
$file_name = basename($arPath["path"]);

require_once "api/onpay_payment.php";

$path = 'http://'.$_SERVER['HTTP_HOST'].$file_path; //Путь к файлу,  например: http://мой_сайт/dir/index.php
$access = COnpayPayment::accessClose; //Запрещаем доступ, по умолчанию 
$summa = floatval(COnpayPayment::summa); //Стоимость доступа к платному разделу
$period = COnpayPayment::period; //Время доступа, в секундах. Исчисляется от времени поступления оплаты за код доступа.
$code = $error = '';
$psObj = new COnpayPayment();
$showCodeForm = false;

?><!DOCTYPE html>
<html>
<head>
<title>Onpay - система платежей интернет-проектов</title>
<meta charset='utf-8'>
<meta content='text/html' http-equiv='Content-Type'>
<meta content='платежная система, Яндекс.Деньги, интернет расчеты, прием платежей, webmoney, осмп, он-лайн платежи, способ оплаты, цифровые деньги, электронная коммерция, обмен, электронный кошелек, интернет платежи, метод оплаты, wmz, прием SMS платежей, интернет платежи' name='keywords'>
<title>OnPay - онлайн прием и агрегация платежей</title>
<link href="api/style.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<div class='content_wrapper'>
<div class="logo"><a href="./">Список файлов</a></div>
<div class='content'>
<?

if($file_name == $index_page) {
	$dir = dirname(__FILE__);
	$cnt = 0;
	if($dh = opendir($dir)) {
		while (($file = readdir($dh)) !== false) {
			if(is_dir($dir."/".$file) || in_array($file, array(".", "..", ".htaccess", $index_page))) continue;
			if($cnt++ == 0) {
				echo "<h1>Список файлов:</h1>";
			}
			echo "<a href=\"{$file}\">{$file}</a><br />";
		}
		closedir($dh);
	}
} elseif(!file_exists($_SERVER['DOCUMENT_ROOT'].$file_path)) {
	header('HTTP/1.0 404 Not Found');?>
	<h1>Файл <span class="name"><?=$file_name?></span> не найден.</h1>
<?} else {?>
	<h1>Доступ к файлу <a class="name" href="<?=$file_name?>"><?=$file_name?></a> закрыт.</h1>
<?
	if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['pay']) || isset($_POST['code']))) {
		if($psObj->OpenDB()) {
			if(isset($_POST['pay']) && $summa > 0) {
				if($url = $psObj->NewPayment($code, $summa, $path)) {
					$showCodeForm = true;?>
					<p class="form form3">
						<span class="caption caption3">Запомните этот код доступа: <span class="code"><?=$code?></span></span> 
						<a target="_blank" href="<?=$url?>" target="_blank"><input type="button" class="submit" name="pay" value="оплатить"></a>
					</p>
				<?} else {
					$error = 'Ошибка при создании платежной ссылки.';
				}
			} elseif(isset($_POST['code'])) {
				if(!$psObj->CheckPayment($_POST['code'], $path)) {
					$error = 'Введен неправильный код доступа (не существует / не оплачен / просрочен).';
				} else {
					ob_end_clean();
					$ext = substr($file_name, strrpos($file_name, ".")+1);
					header("Content-Type: application/force-download; name=\"".$file_name."\"");
					switch($ext) {
						case "gz": header('Content-type: application/x-gzip'); break;
						case "png": header('Content-type: image/png'); break;
					}
					echo file_get_contents($_SERVER['DOCUMENT_ROOT'].$file_path);
					exit;
				}
			}
			$psObj->CloseDB();
		} else {
			$error = 'Системная ошибка.';	// Ошибка подключения к БД
		}
	} else {
		$showCodeForm = true;
	?>
	
	<div class="form"><form method="POST" action="<?=$path; //Выводим путь на который будет отправлена форма (на текущую страницу) ?>">
	<span class="caption caption1">Доступ до <?=date('H:i:s d.m.Y',time()+$period); //Выводим дату ?> всего за <?=$summa; //Выводим сумму ?>&nbsp;руб.</span>
	<input type="submit" class="submit" name="pay" value="купить">
	</form></div>
	<?php
	}
}
if($showCodeForm) {
?>
	<p class="form">или</p>
	<div class="form"><form method="POST" action="<?echo $path; //Выводим путь на который будет отправлена форма (на текущую страницу) ?>">
	<span class="caption caption2">Оплаченный код доступа</span>
	<input class="input" type="text" name="code" value="<?=$code?>">
	<input type="submit" class="submit" value="ввести">
	</form></div>
<?}?>
	<p><?=$error; //Выводим ошибки?></p>
</div></div>
</body></html>
<?

ob_end_flush();