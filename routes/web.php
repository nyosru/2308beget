<?php

use App\Http\Controllers\AuthTelegrammController;
use App\Http\Controllers\Domain\CuponController;
use App\Http\Controllers\Domain\DomainController;
use App\Http\Controllers\Krugi\KrugiController;
use App\Http\Controllers\PhpcatController;
use Illuminate\Support\Facades\Route;

//use Illuminate\Contracts\Cookie\Factory as Coockie;
//use Illuminate\Support\Facades\App;


$d = function () {
    Route::get('/{any?}', [KrugiController::class, 'index'])->name('index');
};
Route::group([
    'as' => 'krugi.',
    'domain' => 'krugi.local'], $d);
Route::group([
//    'as' => 'krugi.',
    'domain' => 'xn--f1aeeb2as.xn--90adfbu3bff.xn--p1ai'], $d);


$d = function () {
    Route::get('/test', [DomainController::class, 'test']);
    Route::post('/test', [DomainController::class, 'test']);

    Route::get('/go/{locale}',
        function ($locale) {
            if (!in_array($locale, [
                'en',
                'ru'
//            'es', 'fr'
            ])) {
                abort(400);
            }
//            Coockie->forever();// ::forever('language', $lang);
            session()->put('locale', $locale);
//            App::setlocale($lang);
//            $e = new DomainController();
            return redirect()->back();

        });

    Route::GET('/', [DomainController::class, 'index'])->name('domain_index');
    Route::GET('/', [DomainController::class, 'index'])->name('login');

    Route::get('/logout', [AuthTelegrammController::class, 'logout'])->name('logout_lk');
    Route::post('/domain_add', [DomainController::class, 'domain_add'])->name('domain_add');

    Route::resource('/lk/cupon', CuponController::class)->only(['store', 'index']);
    Route::GET('/pay/success', [CuponController::class, 'paySuccess'])->name('onpay_url_success');
    Route::GET('/pay/fail', [CuponController::class, 'payFail'])->name('onpay_url_success');
    Route::GET('/backword', [DomainController::class, 'backword'])->name('domain_backword');
    Route::POST('/backword', [DomainController::class, 'backwordSend'])->name('domain_backword_send');
};

Route::group([
    //    'as' => 'domain.',
    'domain' => 'domain.dev.php-cat.com'], $d);
//Route::group( [
////    'as' => 'domain.',
//    'domain' => 'domain.php-cat.com' ], $d);
Route::group([
    'as' => 'domain77.',
    'domain' => 'domainwaiter.com'], $d);


$d = function () {
    Route::get('/{any?}', [PhpcatController::class, 'index']);
};
Route::group(array('domain' => 'phpcat.local'), $d);


//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
//
//require __DIR__ . '/auth.php';

$d = function () {
    Route::view('/', 'site_ttt.welcome')->name('site_ttt_index');
};

Route::group(array('domain' => 'ttt72.local'), $d);
Route::group(array('domain' => 'ttt72.ru'), $d);
Route::group(array('domain' => 'xn--72-qmcaa.xn--p1ai'), $d);
Route::group(array('domain' => 'ттт72.рф'), $d);

//xn--f1aeeb2as.xn--90adfbu3bff.xn--p1ai.
//IDN: кружки.сергейсб.рф
