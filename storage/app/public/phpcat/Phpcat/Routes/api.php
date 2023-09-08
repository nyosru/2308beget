<?php

use Modules\Phpcat\Http\Controllers\TestController;
use Modules\Phpcat\Http\Controllers\TimelineController;

// Route::get('/phpcat/news', function () {
//     // return new PhpcatNewsResource( EntitiesPhpcatNews::all()->sortByDesc('date') );
//     return new PhpcatNewsCollection( EntitiesPhpcatNews::all()->sortByDesc('date') );
// });


Route::get('/phpcat/news', [ TimelineController::class , 'index' ] );
Route::post('/phpcat/news', [ TimelineController::class , 'store' ] );

Route::get('/phpcat/tests', [ TestController::class , 'index' ] );
Route::post('/phpcat/tests', [ TestController::class , 'store' ] );

// Route::resource('/phpcat/tests', TestController::class );
// Route::get('/phpcat/tests', [ TestController::class , 'store' ] );
// Route::apiResource('/phpcat/tests', TestController::class );

// Route::get('/phpcat/tests', function (Request $request) {
//     return new PhpcatTestResource( PhpcatTest::all()->sortByDesc('date') );
// });
