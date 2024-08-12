<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\TampilanAwalController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TampilanAwalController::class, 'index'])->name('index');
Route::get('/berita/{id}', [TampilanAwalController::class, 'berita'])->name('berita.detail');
Route::get('/sejarah', [TampilanAwalController::class, 'sejarah'])->name('sejarah');
Route::get('/visi-misi', [TampilanAwalController::class, 'visimisi'])->name('visimisi');
Route::get('/pemerintahan-desa', [TampilanAwalController::class, 'pemerintahan'])->name('pemerintahan');
Route::get('/pemerintahan-desa/{id}', [TampilanAwalController::class, 'detailPemerintahan'])->name('detailpem');
Route::get('/wisata', [TampilanAwalController::class, 'wisata'])->name('wisata');
Route::get('/dokumentasi-kegiatan', [TampilanAwalController::class, 'kegiatan'])->name('kegiatan');
Route::get('/rekapulasi-penduduk', [TampilanAwalController::class, 'rekapulasi'])->name('rekapulasi');
Route::get('/penduduk/cari', [TampilanAwalController::class, 'searchPenduduk'])->name('penduduk.cari');
Route::get('/dashboard/admin/penduduk/urut', [TampilanAwalController::class, 'sortPenduduk'])->name('penduduk.urut');
Route::get('/kependudukan', [TampilanAwalController::class, 'kpendudukan'])->name('kpendudukan');
Route::get('/kependudukan/sort', [TampilanAwalController::class, 'sortKependudukan'])->name('ks');
Route::get('/pemetaan', [TampilanAwalController::class, 'pemetaan'])->name('pemetaan');
Route::get('/beritadesa', [TampilanAwalController::class, 'beritadesa'])->name('beritadesa');
Route::get('/pengumuman', [TampilanAwalController::class, 'pengumuman'])->name('pengumuman');
Route::get('/detailpengumuman/{id}', [TampilanAwalController::class, 'detailPengumuman'])->name('detailpengumuman');






// Admin login & register
Route::get('/login', [AuthController::class, 'loginAdmin'])->name('login');
Route::get('/admin/login', [AuthController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/admin/login', [AuthController::class, 'handleAdminLogin']);
Route::get('/admin/register', [AuthController::class, 'registerAdmin'])->name('registerAdmin');
Route::post('/admin/register', [AuthController::class, 'handleAdminRegister']);

// Masyarakat login & register
Route::get('/login-masyarakat', [AuthController::class, 'loginMasyarakat'])->name('login.masyarakat');
Route::get('/masyarakat/login', [AuthController::class, 'loginMasyarakat'])->name('loginMasyarakat');
Route::post('/masyarakat/login', [AuthController::class, 'handleMasyarakatLogin']);
Route::get('/masyarakat/register', [AuthController::class, 'registerMasyarakat'])->name('registerMasyarakat');
Route::post('/masyarakat/register', [AuthController::class, 'handleMasyarakatRegister']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes for masyarakat
Route::middleware(['auth:masyarakat'])->group(function () {
    Route::get('/dashboard/masyarakat', [DashboardController::class, 'masyarakatDashboard'])->name('dashboard.masyarakat');
    Route::get('/dashboard/masyarakat/pengaduan', [DashboardController::class, 'masyarakatpengaduan'])->name('pengaduan');
    Route::post('/dashboard/masyarakat/pengaduan', [DashboardController::class, 'pengajuanPengaduan'])->name('pengaduan.ajukan');
   Route::get('/dashboard/masyarakat/pengaduan/{id}', [DashboardController::class, 'detailPengaduan'])->name('pengaduan.detail');

    // other protected routes for masyarakat
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard/admin/penduduk/export', [AdminController::class, 'exportExcel'])->name('penduduk.export');
    Route::get('/dashboard/admin/dokumentasi/edit/{id}', [AdminController::class, 'editDokumentasi'])->name('dokumentasi.edit');
Route::put('/dashboard/admin/dokumentasi/update/{id}', [AdminController::class, 'updateDokumentasi'])->name('dokumentasi.update');
Route::delete('/dashboard/admin/dokumentasi/hapus/{id}', [AdminController::class, 'hapusDokumentasi'])->name('dokumentasi.hapus');
    Route::get('/dashboard/admin/dokumentasi', [AdminController::class, 'dokumentasi'])->name('dokumentasi.admin');
Route::post('/dashboard/admin/dokumentasi/tambah', [AdminController::class, 'tambahDokumentasi'])->name('dokumentasi.tambah');
    Route::get('/dashboard/admin/penduduk/search', [AdminController::class, 'searchPenduduk'])->name('penduduk.search');
Route::get('/dashboard/admin/penduduk/sort', [AdminController::class, 'sortPenduduk'])->name('penduduk.sort');
    
    
    Route::get('/dashboard/admin', [AdminController::class, 'dashboard'])->name('dashboard.admin');
    Route::get('/dashboard/admin/artikel', [AdminController::class, 'artikel'])->name('artikel.admin');
    Route::post('/dashboard/admin/artikel/tambah', [AdminController::class, 'tambahArtikel'])->name('artikel.tambah');
Route::get('/dashboard/admin/artikel/edit/{id}', [AdminController::class, 'editArtikel'])->name('artikel.edit');
Route::put('/dashboard/admin/artikel/update/{id}', [AdminController::class, 'updateArtikel'])->name('artikel.update');
Route::delete('/dashboard/admin/artikel/hapus/{id}', [AdminController::class, 'hapusArtikel'])->name('artikel.hapus');
   
     Route::get('/dashboard/admin/pengaduan', [AdminController::class, 'pengaduan'])->name('pengaduan.admin');
    Route::get('/dashboard/admin/pengaduanproses', [AdminController::class, 'pengaduandiproses'])->name('pengaduandiproses.admin');
    Route::get('/dashboard/admin/pengaduanselesai', [AdminController::class, 'pengaduanselesai'])->name('pengaduanselesai.admin');
    Route::post('/dashboard/admin/pengaduan/{id}/tanggapi', [AdminController::class, 'tanggapiPengaduan'])->name('pengaduan.tanggapi');
    Route::get('/dashboard/admin/pengaduan/{id}/detail', [AdminController::class, 'detailPengaduan'])->name('pengaduan.detail');
    Route::delete('/dashboard/admin/pengaduan/{id}', [AdminController::class, 'hapusPengaduan'])->name('pengaduan.hapus');
     Route::get('/dashboard/admin/penduduk', [AdminController::class, 'penduduk'])->name('penduduk.admin');
    Route::post('/admin/penduduk/tambah', [AdminController::class, 'tambahDataPenduduk'])->name('penduduk.tambah');
    Route::get('/dashboard/admin/penduduk/edit/{id}', [AdminController::class, 'editPenduduk'])->name('penduduk.edit');
    Route::put('/dashboard/admin/penduduk/update/{id}', [AdminController::class, 'updatePenduduk'])->name('penduduk.update');
    Route::delete('/dashboard/admin/penduduk/hapus/{id}', [AdminController::class, 'hapusPenduduk'])->name('penduduk.hapus');
    Route::get('/dashboard/admin/pemetaan', [AdminController::class, 'pemetaan'])->name('pemetaan.admin');
     Route::get('/dashboard/admin/petugas', [AdminController::class, 'petugas'])->name('petugas.admin');
    Route::post('/dashboard/admin/petugas/tambah', [AdminController::class, 'tambahPetugas'])->name('petugas.tambah');
    // Route untuk menampilkan halaman edit
Route::get('/dashboard/admin/petugas/edit/{id}', [AdminController::class, 'edit'])->name('petugas.edit');
Route::post('/dashboard/admin/petugas/edit/{id}', [AdminController::class, 'update'])->name('petugas.update');
    Route::delete('/dashboard/admin/petugas/hapus/{id}', [AdminController::class, 'hapusPetugas'])->name('petugas.hapus');
    Route::get('/dashboard/admin/petugas/filter', [AdminController::class, 'filterPetugas'])->name('petugas.filter');
Route::get('/dashboard/admin/petugas/search', [AdminController::class, 'searchPetugas'])->name('petugas.search');
Route::post('/dashboard/admin/pengaduan/{id}/selesai', [AdminController::class, 'selesaikanPengaduan'])->name('pengaduan.selesai');
    Route::get('/pemerintah/admin', [AdminController::class, 'pemerintahdesa'])->name('pemerintah.admin');
    Route::post('/pemerintah/admin/tambah', [AdminController::class, 'tambahPemerintahDesa'])->name('pemerintah.tambah');
    Route::get('/pemerintah/admin/edit/{id}', [AdminController::class, 'editPemerintahDesa'])->name('pemerintah.edit');
Route::put('/pemerintah/admin/update/{id}', [AdminController::class, 'updatePemerintahDesa'])->name('pemerintah.update');
Route::delete('/pemerintah/admin/hapus/{id}', [AdminController::class, 'hapusPemerintahDesa'])->name('pemerintah.hapus');
Route::get('/admin/pemerintah-desa/search', [AdminController::class, 'searchPemerintahDesa'])->name('pemerintah.search');
    Route::get('/admin/kependudukan', [AdminController::class, 'kependudukan'])->name('kependudukan.admin');
    Route::post('/admin/kependudukan/tambah', [AdminController::class, 'tambahKependudukan'])->name('kependudukan.tambah');
    Route::get('/admin/kependudukan/edit/{id}', [AdminController::class, 'editKependudukan'])->name('kependudukan.edit');
    Route::put('/admin/kependudukan/update/{id}', [AdminController::class, 'updateKependudukan'])->name('kependudukan.update');
    Route::delete('/admin/kependudukan/hapus/{id}', [AdminController::class, 'hapusKependudukan'])->name('kependudukan.hapus');
    Route::get('/admin/kependudukan/search', [AdminController::class, 'searchKependudukan'])->name('kependudukan.search');
Route::get('/admin/kependudukan/sort', [AdminController::class, 'sortKependudukan'])->name('kependudukan.sort');
 Route::get('/dashboard/admin/kependudukan/export', [AdminController::class, 'exportKependudukan'])->name('kependuduk.export');
  Route::get('/admin/pengumuman', [AdminController::class, 'pengumuman'])->name('pengumuman.admin');
    Route::post('/dashboard/admin/pengumuman/tambah', [AdminController::class, 'tambahPengumuman'])->name('pengumuman.tambah');
Route::delete('/dashboard/admin/pengumuman/{id}', [AdminController::class, 'hapusPengumuman'])->name('pengumuman.hapus');
Route::get('/dashboard/admin/pengumuman/edit/{id}', [AdminController::class, 'editPengumuman'])->name('pengumuman.edit');
Route::put('/dashboard/admin/pengumuman/update/{id}', [AdminController::class, 'updatePengumuman'])->name('pengumuman.update');
Route::put('/dashboard/admin/update-profile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
});



Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/dashboard/staff', [StaffController::class, 'Staffdashboard'])->name('dashboard.staff');
   
});

Route::middleware(['auth', 'role:rt'])->group(function () {
    Route::get('/dashboard/rt', [RTController::class, 'dashboard'])->name('dashboard.rt');
});