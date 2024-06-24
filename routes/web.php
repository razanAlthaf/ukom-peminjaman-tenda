<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataSewaController;
use App\Http\Controllers\AlatBahanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SewaTendaController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware(['auth', 'verified', 'role:admin|management|peminjam'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

//alat bahan
Route::middleware(['auth', 'verified', 'role:admin|management'])->group(function () {
    Route::get('/alatBahans', [AlatBahanController::class, 'index'])->name('alatBahan.index');
});

Route::resource('alatBahans', AlatBahanController::class);

//data sewa
Route::get('/sewaTenda', [SewaTendaController::class, 'index'])->name('sewa_tendas.index');
Route::post('/sewaTenda', [SewaTendaController::class, 'store'])->name('sewa_tendas.store');

Route::resource('dataSewa', DataSewaController::class)->except(['show']);
//generate doc
Route::get('dataSewa/export', [DataSewaController::class, 'exportDoc'])->name('dataSewa.export');

Route::middleware(['auth', 'verified', 'role:admin|management'])->group(function () {
    Route::get('/generateLaporan', [LaporanController::class, 'index'])->name('laporan.index');
});
