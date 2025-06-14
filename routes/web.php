<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerumahanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\DetailproyekController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('perumahan', PerumahanController::class);
Route::resource('karyawan', KaryawanController::class);
Route::resource('pekerjaan', PekerjaanController::class);
Route::resource('bahan', BahanController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('proyek', ProyekController::class);
Route::resource('detailproyek', DetailproyekController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

require __DIR__.'/auth.php';
