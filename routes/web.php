<?php

use App\Http\Controllers\AuthTelegrammController;
use App\Http\Controllers\Domain\CuponController;
use App\Http\Controllers\Domain\DomainController;
use Illuminate\Support\Facades\Route;

$d = function () {

    Route::get('/test', [DomainController::class, 'test']);
    Route::post('/test', [DomainController::class, 'test']);

    Route::get('/', [DomainController::class, 'index'])->name('domain_index');
    Route::get('/', [DomainController::class, 'index'])->name('login');

//    Route::get('/', [DomainController::class, 'index'])->name('login');

//    Route::get('/enter', [DomainController::class, 'index_enter'])
//        ->name('domain_enter')
//        ->middleware('auth');

    Route::get('/logout', [AuthTelegrammController::class, 'logout'])->name('logout_lk');
    Route::post('/domain_add', [DomainController::class, 'domain_add'])->name('domain_add');
//    Route::resource('/lk/cupons', CuponController::class )->name('domain_cupon');
    Route::resource('/lk/cupon', CuponController::class)->only(['store', 'index']);

    Route::GET('/pay/success', [CuponController::class, 'paySuccess'])->name('onpay_url_success');
    Route::GET('/pay/fail', [CuponController::class, 'payFail'])->name('onpay_url_success');

};

//    Route::group(array('domain' => (strpos($_SERVER['HTTP_HOST'], 'dev') !== false) ? 'domain.dev.php-cat.com' : 'domain.php-cat.com' ), $d);
Route::group(array('domain' => 'domain.dev.php-cat.com'), $d);
//    Route::group(array('domain' => 'domain.php-cat.com'), $d);


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
