<?php

namespace App\Http\Controllers;

use App\Http\Requests\OnPayRequest;
use Illuminate\Http\Request;

class OnPayController extends Controller
{

    public static $merchant_login = '';
    public static $linkPaySystem = 'http://secure.onpay.ru/pay/';

    public function apiCall(Request $request)
    {

        // file_get_contents('https://api.uralweb.info/telegram.php?' . http_build_query(
        file_get_contents('https://api.php-cat.com/telegram.php?' . http_build_query(
                array(
                    // 's' => '1',
                    's' => md5($_SERVER['HTTP_HOST']),
                    'domain' => $_SERVER['HTTP_HOST'],
                    // 'msg' => $_SERVER['HTTP_HOST'] . PHP_EOL . $msg,
//                    'msg' => $msg,
                    'msg' => json_encode($request),
                    // OrderUraBot @order_ura_bot:
//                    'token' => env('TELEGA_ORDERBOT_TOKEN', 'xx'),
//                    'id' => [   // 1368605419, // я тест
//                        // серхио тест
//                        // 5152088168,
//                        // 2037908418 // ваш метролог
//
//
//
//                        // first_name: Авто-АС
//                        1022228978,
//                        // Денис Авто-СА
//                        663501687 ]
                )
            ));

        dd($request);
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
}
