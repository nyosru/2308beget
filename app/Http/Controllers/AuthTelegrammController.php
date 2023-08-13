<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthTelegrammController extends Controller
{

    public $token = '';

    function callback(Request $request)
    {
        $this->token = '6290040530:AAFKIl0csADmwkXYUCSqEWXwlbFOItlv9Hg';
        // $res = $this->checkTelegramAuthorization($request->all());
        // dd(['прошёл реавтор норм',$res]);

        try {
            $res = $this->checkTelegramAuthorization($request->all());
            $user = User::where('telegram_id', $res['id'])->first();
            // dd([ $user, empty($user) ]);
            // если пользователяя не нашли, регаем
            if (empty($user)) {

                $user = new User();
                // $user->telegram_id = $id;
                $user->name = $res['first_name'];
                $user->password = md5($res['id'] . '.telega@php-cat.com77');
                $user->email = $res['id'] . '.telega@php-cat.com';
                $user->telegram_id = $res['id'];
                $user->name_first = $res['first_name'];
                $user->name_last = $res['last_name'];
                $user->telegram_username = $res['username'];
                $user->telegram_photo = $res['photo_url'];
                $user->telegram_auth_date = $res['auth_date'];

                $user->save();
                // $user_created = $user->id;

            }
            // else {
            //     dd([777, $user]);
            // }

            // dd(['uu',$user->id]);
            // $ee =  
            // Auth::logout();

            // Session::flash('flash_message_error', trans('interface.AccountNotActive'));
            // \Session::flash('flash_message', trans('interface.ActivatedSuccess'));
            // $request->session()->invalidate();
            //  $request->session()->regenerateToken();

            Auth::loginUsingId($user->id, true);

            return redirect()
                // ->route('domain_home')
                ->route('domain_enter')
                ->with('success', 'Вы успешно авторизовались, доступен персональный функционал!');
            // ->flash('success', 'Вы успешно авторизовались, доступен персональный функционал!');

            // return to_route('login_post', ['login' => $user->email, 'password' => md5($user->email . '77')]);
            // return redirect()->route('login_post', ['login' => $user->email, 'password' => md5($user->email . '77')]);

        } catch (\Exception $ex) {
            dd($ex);
        }

    }


    /**
     * проверяем инфу что пришла с телграмма
     */
    function checkTelegramAuthorization($auth_data): array
    {

        // dd($auth_data);

        $check_hash = $auth_data['hash'];
        unset($auth_data['hash']);

        $data_check_arr = [];
        foreach ($auth_data as $key => $value) {
            $data_check_arr[] = $key . '=' . $value;
        }
        sort($data_check_arr);

        $data_check_string = implode("\n", $data_check_arr);
        $secret_key = hash('sha256', $this->token, true);
        $hash = hash_hmac('sha256', $data_check_string, $secret_key);

        if (strcmp($hash, $check_hash) !== 0) {
            throw new \Exception('Data is NOT from Telegram');
        }

        if ((time() - $auth_data['auth_date']) > 86400) {
            throw new \Exception('Data is outdated');
        }

        return $auth_data;
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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