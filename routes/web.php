<?php

use App\Http\Controllers\AsetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

Route::controller(LoginController::class)->group(function () {
    Route::get('/','LoginView')->middleware('guest');
    Route::post('/login','login')->name('login')->middleware('guest');
    Route::get('/logout','logout')->name('logout')->middleware('auth');
});

Route::controller(DashboardController::class)->group(function(){
    Route::get('/dashboard/home','index')->middleware('auth')->name('home');
});

Route::controller(AsetController::class)->middleware(['auth', 'role:pegawai tu'])->group(function(){
    Route::get('/dashboard/aset','index')->name('aset.index');
    Route::post('/dashboard/aset/store','store')->name('aset.store');
});
