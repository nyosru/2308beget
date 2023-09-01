<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TelegramController extends Controller
{

    public static $token_telega = '6639660147:AAEt_jnVDblGLeVT6yP0-OECDaM8Ezg5m5g';

    public static function send( string $msg,  int $telegaId = 360209578 ): void
    {
        self::sendMsg($telegaId, $msg);
    }

    public static function sendMsgToUser(User $user, string $msg): void
    {
        self::sendMsg($user->telegram_id, $msg);
    }

    public static function sendMsg(int $telega_id, string $msg): void
    {

        file_get_contents('https://api.php-cat.com/telegram.php?' . http_build_query(
                array(
                    // 's' => '1',
                    's' => md5($_SERVER['HTTP_HOST'] ?? 'domain.php-cat.com'),
                    'domain' => $_SERVER['HTTP_HOST'] ?? 'domain.php-cat.com',
                    // 'msg' => $_SERVER['HTTP_HOST'] . PHP_EOL . $msg,
                    'msg' => $msg,
                    // OrderUraBot @order_ura_bot:
//                    'token' => env('TELEGA_ORDERBOT_TOKEN', 'xx'),
                    'token' => self::$token_telega,
                    'id' => [
                        $telega_id
                        // 1368605419, // я тест
                        // серхио тест
                        // 5152088168,
                    ]
                )
            ));

    }

}
