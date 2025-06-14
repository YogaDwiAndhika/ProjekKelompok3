<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerumahanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\DetailProyekController;

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

Route::get('/layout', function () {
    return view('layout.main');
});

Route::resource('perumahan', PerumahanController::class);
Route::resource('karyawan', KaryawanController::class);
Route::resource('pekerjaan', PekerjaanController::class);
Route::resource('bahan', BahanController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('proyek', ProyekController::class);
Route::resource('detailproyek', DetailProyekController::class);
