<?php

use Modules\Phpcat\Http\Controllers\PhpcatController;

$appRoutes = function() {
    Route::get('/', [PhpcatController::class,'index']);
    // Route::get('{any?}', [PhpcatController::class,'index']);
    Route::get('{any?}/{action?}', [PhpcatController::class,'index']);
};

Route::group(array('domain' => 'd2.php-cat.com'), $appRoutes);

Route::group(array('domain' => 'php.local'), $appRoutes);
Route::group(array('domain' => 'php-cat.com'), $appRoutes);
Route::group(array('domain' => 'phpcat.dev45.php-cat.com'), $appRoutes);
Route::group(array('domain' => 'phpcat.dev54.uralweb.info'), $appRoutes);
// Route::group(array('domain' => 'phpcat.17.ru'), $appRoutes);
// Route::group(array('domain' => 'localhost'), $appRoutes);
// Route::group(array('domain' => 'phpcat.base17.php-cat.com'), $appRoutes);
