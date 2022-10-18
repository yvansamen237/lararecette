<?php

use App\Http\Controllers\PlaceHolderApiController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/api', [PlaceHolderApiController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);


Route::middleware(['admin'])->group(function () {

    Route::get('/foo', [TestController::class, 'foo']);
    Route::get('/bar', [TestController::class, 'bar']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';