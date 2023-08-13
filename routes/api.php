<?php

use App\Http\Controllers\AuthTelegrammController;
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

    Route::get('telega-auth/callback', [AuthTelegrammController::class,'callback']);
    // Route::get('{any?}', [PhpcatController::class,'index']);
    // Route::get('{any?}/{action?}', [PhpcatController::class,'index']);

};

Route::group(array('domain' => 'site2.local'), $d);
Route::group(array('domain' => 'domain.php-cat.com'), $d);

