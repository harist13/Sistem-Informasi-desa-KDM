<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/login', function () {
    return view('index');
});

// Admin login & register
Route::get('/admin/login', [AuthController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/admin/login', [AuthController::class, 'handleAdminLogin']);
Route::get('/admin/register', [AuthController::class, 'registerAdmin'])->name('registerAdmin');
Route::post('/admin/register', [AuthController::class, 'handleAdminRegister']);

// Masyarakat login & register
Route::get('/masyarakat/login', [AuthController::class, 'loginMasyarakat'])->name('loginMasyarakat');
Route::post('/masyarakat/login', [AuthController::class, 'handleMasyarakatLogin']);
Route::get('/masyarakat/register', [AuthController::class, 'registerMasyarakat'])->name('registerMasyarakat');
Route::post('/masyarakat/register', [AuthController::class, 'handleMasyarakatRegister']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes for masyarakat
Route::middleware(['auth:masyarakat'])->group(function () {
    Route::get('/dashboard/masyarakat', [DashboardController::class, 'masyarakatDashboard'])->name('dashboard.masyarakat');
    Route::get('/dashboard/masyarakat/artikel', [DashboardController::class, 'masyarakatartikel'])->name('artikel.masyarakat');
    Route::get('/dashboard/masyarakat/pengaduan', [DashboardController::class, 'masyarakatpengaduan'])->name('pengaduan');
   

    // other protected routes for masyarakat
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'dashboard'])->name('dashboard.admin');
    Route::get('/dashboard/admin/artikel', [AdminController::class, 'artikel'])->name('artikel.admin');
    Route::get('/dashboard/admin/pengaduan', [AdminController::class, 'pengaduan'])->name('pengaduan.admin');
    Route::get('/dashboard/admin/tanggapan', [AdminController::class, 'tanggapan'])->name('tanggapan.admin');
    Route::get('/dashboard/admin/petugas', [AdminController::class, 'petugas'])->name('petugas.admin');
    Route::get('/dashboard/admin/penduduk', [AdminController::class, 'penduduk'])->name('penduduk.admin');
    Route::get('/dashboard/admin/surat', [AdminController::class, 'surat'])->name('surat.admin');
    Route::get('/dashboard/admin/pemetaan', [AdminController::class, 'pemetaan'])->name('pemetaan.admin');
});