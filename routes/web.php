<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RTController;
use Illuminate\Support\Facades\Route;


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
    Route::post('/dashboard/masyarakat/pengaduan', [DashboardController::class, 'pengajuanPengaduan'])->name('pengaduan.ajukan');
   

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
     Route::get('/dashboard/admin/petugas', [AdminController::class, 'petugas'])->name('petugas.admin');
    Route::post('/dashboard/admin/petugas/tambah', [AdminController::class, 'tambahPetugas'])->name('petugas.tambah');
    // Route untuk menampilkan halaman edit
Route::get('/dashboard/admin/petugas/edit/{id}', [AdminController::class, 'edit'])->name('petugas.edit');
Route::post('/dashboard/admin/petugas/edit/{id}', [AdminController::class, 'update'])->name('petugas.update');
    Route::delete('/dashboard/admin/petugas/hapus/{id}', [AdminController::class, 'hapusPetugas'])->name('petugas.hapus');
    Route::get('/dashboard/admin/petugas/filter', [AdminController::class, 'filterPetugas'])->name('petugas.filter');
Route::get('/dashboard/admin/petugas/search', [AdminController::class, 'searchPetugas'])->name('petugas.search');

});


Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/dashboard/staff', [StaffController::class, 'Staffdashboard'])->name('dashboard.staff');
    Route::get('/dashboard/staff/artikel', [StaffController::class, 'artikel'])->name('artikel.staff');
    Route::get('/dashboard/staff/pengaduan', [StaffController::class, 'pengaduan'])->name('pengaduan.staff');
    Route::get('/dashboard/staff/tanggapan', [StaffController::class, 'tanggapan'])->name('tanggapan.staff');
    Route::get('/dashboard/staff/petugas', [StaffController::class, 'petugas'])->name('petugas.staff');
    Route::get('/dashboard/staff/penduduk', [StaffController::class, 'penduduk'])->name('penduduk.staff');
    Route::get('/dashboard/staff/surat', [StaffController::class, 'surat'])->name('surat.staff');
    Route::get('/dashboard/staff/pemetaan', [StaffController::class, 'pemetaan'])->name('pemetaan.staff');
    Route::post('/dashboard/staff/petugas/tambah', [StaffController::class, 'tambahPetugas'])->name('petugas.tambah.staff');
});

Route::middleware(['auth', 'role:rt'])->group(function () {
    Route::get('/dashboard/rt', [RTController::class, 'dashboard'])->name('dashboard.rt');
    Route::get('/dashboard/rt/artikel', [RTController::class, 'artikel'])->name('artikel.rt');
    Route::get('/dashboard/rt/pengaduan', [RTController::class, 'pengaduan'])->name('pengaduan.rt');
    Route::get('/dashboard/rt/tanggapan', [RTController::class, 'tanggapan'])->name('tanggapan.rt');
    Route::get('/dashboard/rt/petugas', [RTController::class, 'petugas'])->name('petugas.rt');
    Route::get('/dashboard/rt/penduduk', [RTController::class, 'penduduk'])->name('penduduk.rt');
    Route::get('/dashboard/rt/surat', [RTController::class, 'surat'])->name('surat.rt');
    Route::get('/dashboard/rt/pemetaan', [RTController::class, 'pemetaan'])->name('pemetaan.rt');
    Route::post('/dashboard/rt/petugas/tambah', [RTController::class, 'tambahPetugas'])->name('petugas.tambah.rt');
});