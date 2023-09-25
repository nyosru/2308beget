<?php

use App\Http\Controllers\AuthTelegrammController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\Domain\DomainController;
use App\Http\Controllers\OnPayController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\Service\ServiceImageController;
use App\Http\Controllers\WhoisDopController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


$d = function() {

    Route::get('onpay', [OnPayController::class,'apiCall']);
    Route::post('onpay', [OnPayController::class,'apiCall']);

    Route::get('telega-auth/callback', [AuthTelegrammController::class,'callback']);
    Route::get('domain-whois-update/{limit?}', [\App\Http\Controllers\Domain\WhoisController::class,'whoisUpdate']);
    Route::resource('promo', PromocodeController::class );

    Route::resource('buy', BuyController::class )
//        ->only('store')
        ->middleware('auth')
    ;

    // Route::get('{any?}', [PhpcatController::class,'index']);
    // Route::get('{any?}/{action?}', [PhpcatController::class,'index']);

    Route::GET('/domain/deactive/{domain}', [ DomainController::class, 'deactive' ] )
        ->name('domain_deactive')
        ->middleware('auth');

    Route::GET('/domain/buy/bonus/{domain}', [ DomainController::class, 'domainBuyBonus' ] )
        ->name('domainBuyBonus')
        ->middleware('auth');

    Route::GET('/domain/buy-name/bonus/{domain_name}', [ DomainController::class, 'domainNameBuyBonus' ] )
        ->name('domainNameBuyBonus')
        ->middleware('auth');

      Route::get('/whois2/{domain}',function ($domain) {
        $res = WhoisDopController::getDopWhoisOneDomain($domain);
        $save_result = WhoisDopController::saveDopWhoisOneDomain($res);
        dd([$save_result, $res]);
      });
//        return redirect('/'); } )->name('login');
//
////    Route::get('/', [DomainController::class, 'index'])->name('login');
////    Route::get('/enter', [DomainController::class, 'index_enter'])
//        ->name('domain_enter')
//        ->middleware('auth');

};

//Route::group(array('domain' => 'site2.local'), $d);
//Route::group(array('domain' => 'domain.php-cat.com'), $d);
//Route::group(array('domain' => 'domain.dev.php-cat.com'), $d);
//Route::group(array('domain' => (strpos($_SERVER['HTTP_HOST'], 'dev') !== false) ? 'domain.dev.php-cat.com' : 'domain.php-cat.com' ), $d);

if (ENV('APP_ENV', 'x') == 'local') {

    Route::group([
        'as' => 'domain_api.',
//        'domain' => 'domain.dev.php-cat.com'
        'domain' => 'domainwaiter.co'
    ], $d);
//    Route::group([
////    'as' => 'domain.',
//        'domain' => 'domain.php-cat.com'
//    ], $d);
}else {
    Route::group([
        'as' => 'domain_api.',
        'domain' => 'domainwaiter.com'
    ], $d);
}
