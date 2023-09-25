<?php

use App\Http\Controllers\AuthTelegrammController;
use App\Http\Controllers\Domain\CuponController;
use App\Http\Controllers\Domain\DomainController;
use App\Http\Controllers\Krugi\KrugiController;
use App\Http\Controllers\PhpcatController;
use Illuminate\Support\Facades\Route;


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

//    Route::get('/{lang}', [DomainController::class, 'index1'])->name('domain_index1');

//    Route::get('/',function () { return ''; } )->name('domain_index2');
    Route::GET('/', [DomainController::class, 'index'])->name('domain_index');
//    Route::GET('/', [DomainController::class, 'index'])->name('login');
//    Route::GET('/llogin', [DomainController::class, 'index'])->name('login');
    Route::get('/llogin', function () {
        return redirect('/');
    })->name('login');

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
    Route::GET('/backword', [DomainController::class, 'backword'])->name('domain_backword');
    Route::POST('/backword', [DomainController::class, 'backwordSend'])->name('domain_backword_send');
};

//    Route::group(array('domain' => (strpos($_SERVER['HTTP_HOST'], 'dev') !== false) ? 'domain.dev.php-cat.com' : 'domain.php-cat.com' ), $d);
//Route::group(array('domain' => 'domain.dev.php-cat.com'), $d);
//Route::group(array('domain' => ['domain.dev.php-cat.com',
//    'domain.php-cat.com', 'domainwaiter.com'] ), $d);

// локально
if (ENV('APP_ENV', 'x') == 'local') {
    Route::group([
        'as' => 'domain.',
//        'domain' => 'domain.dev.php-cat.com'
        'domain' => 'domainwaiter.co'
    ], $d);
} // боевой
else {
    Route::group([
        'as' => 'domain.',
        'domain' => 'domainwaiter.com'
    ], $d);
}


