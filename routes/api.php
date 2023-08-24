<?php

use App\Http\Controllers\AuthTelegrammController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\Domain\DomainController;
use App\Http\Controllers\OnPayController;
use App\Http\Controllers\PromocodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


$d = function() {

    Route::get('onpay', [OnPayController::class,'apiCall']);
    Route::post('onpay', [OnPayController::class,'apiCall']);

    Route::get('telega-auth/callback', [AuthTelegrammController::class,'callback']);
    Route::get('domain-whois-update', [\App\Http\Controllers\Domain\WhoisController::class,'whoisUpdate']);
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

};

//Route::group(array('domain' => 'site2.local'), $d);
//Route::group(array('domain' => 'domain.php-cat.com'), $d);
Route::group(array('domain' => 'domain.dev.php-cat.com'), $d);
//Route::group(array('domain' => (strpos($_SERVER['HTTP_HOST'], 'dev') !== false) ? 'domain.dev.php-cat.com' : 'domain.php-cat.com' ), $d);

