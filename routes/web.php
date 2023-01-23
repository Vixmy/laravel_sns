<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/timeline', [App\Http\Controllers\TimeController::class, 'showTimelinePage'])->name('timeline');
Route::post('/timeline', [App\Http\Controllers\TimeController::class, 'registerWord'])->name('timeline');
Route::get('/mypage', [App\Http\Controllers\MyPageController::class, 'redirect'])->name('redirect_mypage');
Route::middleware(['auth'])->group(function () {
    Route::get('/{name}', [App\Http\Controllers\MyPageController::class, 'index'])->name('mypage');
});