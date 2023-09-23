<?php

use App\Http\Controllers\AuthTelegrammController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\Domain\DomainController;
use App\Http\Controllers\OnPayController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\Service\ServiceImageController;
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


//Route::get('/resize/{type}/{size}/{imgDir}', [ ServiceImageController::class, 'resizeDir' ] )->name('resizeDir');
//Route::get('/resize/{type}', [ ServiceImageController::class, 'resizeDir' ] )->name('resizeDir');

Route::get('resize', [ServiceImageController::class, 'resizeDir'])->name('resizeDir');

//Route::get('/resize/{locale}',
//    function ($locale) {
//    dd($locale);
////        if (!in_array($locale, [
////            'en',
////            'ru'
//////            'es', 'fr'
////        ])) {
////            abort(400);
////        }
//////            Coockie->forever();// ::forever('language', $lang);
////        session()->put('locale', $locale);
//////            App::setlocale($lang);
//////            $e = new DomainController();
////        return redirect()->back();
//
//    });


//Route::get('photo/mapJs{any?}', [\App\Http\Controllers\Krugi\KrugiController::class,'mapJs']);
Route::get('photo/mapJs', [\App\Http\Controllers\Krugi\KrugiController::class, 'mapJs']);

Route::get('phpcat/news', [\App\Http\Controllers\PhpcatController::class, 'apiNews']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

require('api.domainwaiter.php');
