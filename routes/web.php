<?php

use App\Http\Controllers\Domain\DomainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$d = function () {
    Route::get('/', [DomainController::class, 'index']);
    Route::get('/enter', [DomainController::class, 'index'])->name('domain_enter');
};

Route::group(array('domain' => 'site2.local'), $d);
Route::group(array('domain' => 'domain.php-cat.com'), $d);
Route::group(array('domain' => 'domain.dev.php-cat.com'), $d);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';