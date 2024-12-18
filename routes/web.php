<?php

use App\Http\Controllers\AjukanPeminjamanAsetController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManajemenPeminjamanAsetController;
use App\Http\Controllers\PersetujuanKabagController;
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
    Route::get('/','LoginView')->name('loginView')->middleware('guest');
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

Route::controller(ManajemenPeminjamanAsetController::class)->middleware(['auth','role:pegawai tu'])->group(function(){
    Route::get('dashboard/manajemen-peminjaman/index','index')->name('manajemenPeminjamanAset.index');
    Route::post('dashboard/manajemen-peminjaman/{id}/teruskan','teruskanKabag')->name('manajemenPeminjamanAset.teruskan');
    Route::post('dashboard/manajemen-peminjaman/{id}/ditolak','tolak')->name('manajemenPeminjamanAset.ditolak');
});

Route::controller(AjukanPeminjamanAsetController::class)->middleware(['auth','role:peminjam'])->group(function(){
    Route::get('dashboard/ajukan/peminjaman','index')->name('ajukan.peminjaman');
    route::post('dashboard/ajukan/peminjaman/store','store')->name('ajukan.peminjaman.store');
});

Route::controller(PersetujuanKabagController::class)->middleware(['auth','role:kepala bagian'])->group(function(){
    Route::get('dashboard/kabag/menuggu-persetujuan/index','index')->name('kabag.index');
    Route::post('dashboard/kabag/menuggu-persetujuan/{id}/disetujui', 'setujui')->name('kabag.setuju');
    Route::post('dashboard/kabag/menuggu-persetujuan/{id}/ditolak', 'tolak')->name('kabag.tolak');
});