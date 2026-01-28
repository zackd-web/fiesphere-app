<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProgramController;

/*
|--------------------------------------------------------------------------
| 1. Halaman Publik (Landing Page)
|--------------------------------------------------------------------------
*/

// WAJIB pakai HomeController agar variabel $pricings tidak undefined di landing page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Form pendaftaran publik
Route::post('/pendaftaran', [StudentController::class, 'store'])->name('pendaftaran.store');

/*
|--------------------------------------------------------------------------
| 2. Kelompok Rute Admin (Middleware Auth)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Utama
    Route::view('dashboard', 'dashboard')->name('dashboard');
    // Semua rute di bawah akan otomatis diawali '/admin' dan nama 'admin.'
    Route::prefix('admin')->name('admin.')->group(function () {
        
        /* --- Manajemen Siswa & Pendaftaran --- */
        Route::get('pendaftaran', [StudentController::class, 'pendaftaran'])->name('pendaftaran');
        Route::get('siswa', [StudentController::class, 'siswa'])->name('siswa');
        Route::post('pendaftaran/{id}/enroll', [StudentController::class, 'enroll'])->name('pendaftaran.enroll');

        // CRUD Siswa
        Route::get('siswa/{id}/edit', [StudentController::class, 'edit'])->name('siswa.edit');
        Route::put('siswa/{id}', [StudentController::class, 'update'])->name('siswa.update');
        Route::delete('siswa/{id}', [StudentController::class, 'destroy'])->name('siswa.destroy');

        /* --- Manajemen Program & Pricing --- */
        // Pastikan ProgramController sudah punya method: index, create, store, edit, update, destroy
        Route::get('program', [ProgramController::class, 'index'])->name('program.index'); // Ubah dari 'program'
        Route::get('program/create', [ProgramController::class, 'create'])->name('program.create');
        Route::post('program', [ProgramController::class, 'store'])->name('program.store');
        Route::get('program/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
        Route::put('program/{id}', [ProgramController::class, 'update'])->name('program.update');
        Route::delete('program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');
        /* --- Halaman Statis Admin --- */
        Route::view('fasilitas', 'admin.fasilitas')->name('fasilitas');
        Route::view('promo', 'admin.promo')->name('promo');
    });
});

require __DIR__.'/settings.php';