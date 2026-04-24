<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| 1. Halaman Publik (Landing Page)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * PERBAIKAN KRITIS: 
 * Gunakan 'fsec.register.store' agar tidak bentrok dengan Laravel Breeze.
 * Ini yang menyebabkan error "The password field is required".
 */
Route::post('/submit-pendaftaran', [RegisterController::class, 'store'])->name('fsec.register.store');


/*
|--------------------------------------------------------------------------
| 2. Kelompok Rute Admin (Middleware Auth)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Kelompok rute Admin (Semua rute di sini akan otomatis berawalan 'admin.')
    Route::prefix('admin')->name('admin.')->group(function () {
        
        /* --- Manajemen Register (Pendaftar Baru) --- */
        
        // Menampilkan daftar pendaftar baru (Akses via route('admin.register.index'))
        Route::get('registers', [RegisterController::class, 'index'])->name('register.index');
        
        // Proses memindahkan pendaftar menjadi siswa aktif (Akses via route('admin.register.enroll'))
        Route::post('registers/{id}/enroll', [RegisterController::class, 'enroll'])->name('register.enroll');

        /* --- Manajemen Siswa Aktif --- */
        Route::get('siswa', [StudentController::class, 'index'])->name('siswa');
        Route::get('siswa/{id}/edit', [StudentController::class, 'edit'])->name('siswa.edit');
        Route::put('siswa/{id}', [StudentController::class, 'update'])->name('siswa.update');
        Route::delete('siswa/{id}', [StudentController::class, 'destroy'])->name('siswa.destroy');

        /* --- Manajemen Program & Pricing --- */
        Route::get('program', [ProgramController::class, 'index'])->name('program.index');
        Route::get('program/create', [ProgramController::class, 'create'])->name('program.create');
        Route::post('program', [ProgramController::class, 'store'])->name('program.store');
        Route::get('program/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
        Route::put('program/{id}', [ProgramController::class, 'update'])->name('program.update');
        Route::delete('program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');

        /* --- Manajemen Promo & Event --- */
        Route::get('promo', [PromoController::class, 'index'])->name('promo.index');
        Route::get('promo/create', [PromoController::class, 'create'])->name('promo.create');
        Route::post('promo', [PromoController::class, 'store'])->name('promo.store');
        Route::get('promo/{id}/edit', [PromoController::class, 'edit'])->name('promo.edit');
        Route::put('promo/{id}', [PromoController::class, 'update'])->name('promo.update');
        Route::delete('promo/{id}', [PromoController::class, 'destroy'])->name('promo.destroy');

        // Rute untuk halaman mentor
        Route::get('mentor', [MentorController::class, 'index'])->name('mentor.index');
        Route::get('mentor/create', [MentorController::class, 'create'])->name('mentor.create');
        Route::post('mentor', [MentorController::class, 'store'])->name('mentor.store');
        Route::get('mentor/{id}/edit', [MentorController::class, 'edit'])->name('mentor.edit');
        Route::put('mentor/{id}', [MentorController::class, 'update'])->name('mentor.update');
        Route::delete('mentor/{id}', [MentorController::class, 'destroy'])->name('mentor.destroy');


        /* --- Halaman Statis Admin --- */
        Route::view('fasilitas', 'admin.fasilitas')->name('fasilitas');
        
    });
});

require __DIR__.'/settings.php';