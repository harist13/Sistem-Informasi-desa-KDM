<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RtController;
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
    Route::get('/dashboard/staff/penduduk/export', [StaffController::class, 'exportExcel'])->name('penduduk.export.staff');
    Route::get('/dashboard/staff/dokumentasi/edit/{id}', [StaffController::class, 'editDokumentasi'])->name('dokumentasi.edit.staff');
Route::put('/dashboard/staff/dokumentasi/update/{id}', [StaffController::class, 'updateDokumentasi'])->name('dokumentasi.update.staff');
Route::delete('/dashboard/staff/dokumentasi/hapus/{id}', [StaffController::class, 'hapusDokumentasi'])->name('dokumentasi.hapus.staff');
    Route::get('/dashboard/staff/dokumentasi', [StaffController::class, 'dokumentasi'])->name('dokumentasi.staff');
Route::post('/dashboard/staff/dokumentasi/tambah', [StaffController::class, 'tambahDokumentasi'])->name('dokumentasi.tambah.staff');
    Route::get('/dashboard/staff/penduduk/search', [StaffController::class, 'searchPenduduk'])->name('penduduk.search.staff');
Route::get('/dashboard/staff/penduduk/sort', [StaffController::class, 'sortPenduduk'])->name('penduduk.sort.staff');
    
    
    Route::get('/dashboard/staff', [StaffController::class, 'dashboard'])->name('dashboard.staff');
    Route::get('/dashboard/staff/artikel', [StaffController::class, 'artikel'])->name('artikel.staff');
    Route::post('/dashboard/staff/artikel/tambah', [StaffController::class, 'tambahArtikel'])->name('artikel.tambah.staff');
Route::get('/dashboard/staff/artikel/edit/{id}', [StaffController::class, 'editArtikel'])->name('artikel.edit.staff');
Route::put('/dashboard/staff/artikel/update/{id}', [StaffController::class, 'updateArtikel'])->name('artikel.update.staff');
Route::delete('/dashboard/staff/artikel/hapus/{id}', [StaffController::class, 'hapusArtikel'])->name('artikel.hapus.staff');
   
     Route::get('/dashboard/staff/pengaduan', [StaffController::class, 'pengaduan'])->name('pengaduan.staff');
    Route::get('/dashboard/staff/pengaduanproses', [StaffController::class, 'pengaduandiproses'])->name('pengaduandiproses.staff');
    Route::get('/dashboard/staff/pengaduanselesai', [StaffController::class, 'pengaduanselesai'])->name('pengaduanselesai.staff');
    Route::post('/dashboard/staff/pengaduan/{id}/tanggapi', [StaffController::class, 'tanggapiPengaduan'])->name('pengaduan.tanggapi.staff');
    Route::get('/dashboard/staff/pengaduan/{id}/detail', [StaffController::class, 'detailPengaduan'])->name('pengaduan.detail.staff');
    Route::delete('/dashboard/staff/pengaduan/{id}', [StaffController::class, 'hapusPengaduan'])->name('pengaduan.hapus.staff');
     Route::get('/dashboard/staff/penduduk', [StaffController::class, 'penduduk'])->name('penduduk.staff');
    Route::post('/staff/penduduk/tambah', [StaffController::class, 'tambahDataPenduduk'])->name('penduduk.tambah.staff');
    Route::get('/dashboard/staff/penduduk/edit/{id}', [StaffController::class, 'editPenduduk'])->name('penduduk.edit.staff');
    Route::put('/dashboard/staff/penduduk/update/{id}', [StaffController::class, 'updatePenduduk'])->name('penduduk.update.staff');
    Route::delete('/dashboard/staff/penduduk/hapus/{id}', [StaffController::class, 'hapusPenduduk'])->name('penduduk.hapus.staff');
    Route::get('/dashboard/staff/pemetaan', [StaffController::class, 'pemetaan'])->name('pemetaan.staff');
     Route::get('/dashboard/staff/petugas', [StaffController::class, 'petugas'])->name('petugas.staff');
    Route::post('/dashboard/staff/petugas/tambah', [StaffController::class, 'tambahPetugas'])->name('petugas.tambah.staff');
    // Route untuk menampilkan halaman edit
Route::get('/dashboard/staff/petugas/edit/{id}', [StaffController::class, 'edit'])->name('petugas.edit.staff');
Route::post('/dashboard/staff/petugas/edit/{id}', [StaffController::class, 'update'])->name('petugas.update.staff');
    Route::delete('/dashboard/staff/petugas/hapus/{id}', [StaffController::class, 'hapusPetugas'])->name('petugas.hapus.staff');
    Route::get('/dashboard/staff/petugas/filter', [StaffController::class, 'filterPetugas'])->name('petugas.filter.staff');
Route::get('/dashboard/staff/petugas/search', [StaffController::class, 'searchPetugas'])->name('petugas.search.staff');
Route::post('/dashboard/staff/pengaduan/{id}/selesai', [StaffController::class, 'selesaikanPengaduan'])->name('pengaduan.selesai.staff');
    Route::get('/pemerintah/staff', [StaffController::class, 'pemerintahdesa'])->name('pemerintah.staff');
    Route::post('/pemerintah/staff/tambah', [StaffController::class, 'tambahPemerintahDesa'])->name('pemerintah.tambah.staff');
    Route::get('/pemerintah/staff/edit/{id}', [StaffController::class, 'editPemerintahDesa'])->name('pemerintah.edit.staff');
Route::put('/pemerintah/staff/update/{id}', [StaffController::class, 'updatePemerintahDesa'])->name('pemerintah.update.staff');
Route::delete('/pemerintah/staff/hapus/{id}', [StaffController::class, 'hapusPemerintahDesa'])->name('pemerintah.hapus.staff');
Route::get('/staff/pemerintah-desa/search', [StaffController::class, 'searchPemerintahDesa'])->name('pemerintah.search.staff');
    Route::get('/staff/kependudukan', [StaffController::class, 'kependudukan'])->name('kependudukan.staff');
    Route::post('/staff/kependudukan/tambah', [StaffController::class, 'tambahKependudukan'])->name('kependudukan.tambah.staff');
    Route::get('/staff/kependudukan/edit/{id}', [StaffController::class, 'editKependudukan'])->name('kependudukan.edit.staff');
    Route::put('/staff/kependudukan/update/{id}', [StaffController::class, 'updateKependudukan'])->name('kependudukan.update.staff');
    Route::delete('/staff/kependudukan/hapus/{id}', [StaffController::class, 'hapusKependudukan'])->name('kependudukan.hapus.staff');
    Route::get('/staff/kependudukan/search', [StaffController::class, 'searchKependudukan'])->name('kependudukan.search.staff');
Route::get('/staff/kependudukan/sort', [StaffController::class, 'sortKependudukan'])->name('kependudukan.sort.staff');
 Route::get('/dashboard/staff/kependudukan/export', [StaffController::class, 'exportKependudukan'])->name('kependuduk.export.staff');
  Route::get('/staff/pengumuman', [StaffController::class, 'pengumuman'])->name('pengumuman.staff');
    Route::post('/dashboard/staff/pengumuman/tambah', [StaffController::class, 'tambahPengumuman'])->name('pengumuman.tambah.staff');
Route::delete('/dashboard/staff/pengumuman/{id}', [StaffController::class, 'hapusPengumuman'])->name('pengumuman.hapus.staff');
Route::get('/dashboard/staff/pengumuman/edit/{id}', [StaffController::class, 'editPengumuman'])->name('pengumuman.edit.staff');
Route::put('/dashboard/staff/pengumuman/update/{id}', [StaffController::class, 'updatePengumuman'])->name('pengumuman.update.staff');
Route::put('/dashboard/staff/update-profile', [StaffController::class, 'updateProfile'])->name('staff.updateProfile');
   
});

Route::middleware(['auth', 'role:rt'])->group(function () {
     Route::get('/dashboard/rt/penduduk/export', [RtController::class, 'exportExcel'])->name('penduduk.export.rt');
    Route::get('/dashboard/rt/dokumentasi/edit/{id}', [RtController::class, 'editDokumentasi'])->name('dokumentasi.edit.rt');
Route::put('/dashboard/rt/dokumentasi/update/{id}', [RtController::class, 'updateDokumentasi'])->name('dokumentasi.update.rt');
Route::delete('/dashboard/rt/dokumentasi/hapus/{id}', [RtController::class, 'hapusDokumentasi'])->name('dokumentasi.hapus.rt');
    Route::get('/dashboard/rt/dokumentasi', [RtController::class, 'dokumentasi'])->name('dokumentasi.rt');
Route::post('/dashboard/rt/dokumentasi/tambah', [RtController::class, 'tambahDokumentasi'])->name('dokumentasi.tambah.rt');
    Route::get('/dashboard/rt/penduduk/search', [RtController::class, 'searchPenduduk'])->name('penduduk.search.rt');
Route::get('/dashboard/rt/penduduk/sort', [RtController::class, 'sortPenduduk'])->name('penduduk.sort.rt');
    
    
    Route::get('/dashboard/rt', [RtController::class, 'dashboard'])->name('dashboard.rt');
    Route::get('/dashboard/rt/artikel', [RtController::class, 'artikel'])->name('artikel.rt');
    Route::post('/dashboard/rt/artikel/tambah', [RtController::class, 'tambahArtikel'])->name('artikel.tambah.rt');
Route::get('/dashboard/rt/artikel/edit/{id}', [RtController::class, 'editArtikel'])->name('artikel.edit.rt');
Route::put('/dashboard/rt/artikel/update/{id}', [RtController::class, 'updateArtikel'])->name('artikel.update.rt');
Route::delete('/dashboard/rt/artikel/hapus/{id}', [RtController::class, 'hapusArtikel'])->name('artikel.hapus.rt');
   
     Route::get('/dashboard/rt/pengaduan', [RtController::class, 'pengaduan'])->name('pengaduan.rt');
    Route::get('/dashboard/rt/pengaduanproses', [RtController::class, 'pengaduandiproses'])->name('pengaduandiproses.rt');
    Route::get('/dashboard/rt/pengaduanselesai', [RtController::class, 'pengaduanselesai'])->name('pengaduanselesai.rt');
    Route::post('/dashboard/rt/pengaduan/{id}/tanggapi', [RtController::class, 'tanggapiPengaduan'])->name('pengaduan.tanggapi.rt');
    Route::get('/dashboard/rt/pengaduan/{id}/detail', [RtController::class, 'detailPengaduan'])->name('pengaduan.detail.rt');
    Route::delete('/dashboard/rt/pengaduan/{id}', [RtController::class, 'hapusPengaduan'])->name('pengaduan.hapus.rt');
     Route::get('/dashboard/rt/penduduk', [RtController::class, 'penduduk'])->name('penduduk.rt');
    Route::post('/rt/penduduk/tambah', [RtController::class, 'tambahDataPenduduk'])->name('penduduk.tambah.rt');
    Route::get('/dashboard/rt/penduduk/edit/{id}', [RtController::class, 'editPenduduk'])->name('penduduk.edit.rt');
    Route::put('/dashboard/rt/penduduk/update/{id}', [RtController::class, 'updatePenduduk'])->name('penduduk.update.rt');
    Route::delete('/dashboard/rt/penduduk/hapus/{id}', [RtController::class, 'hapusPenduduk'])->name('penduduk.hapus.rt');
    Route::get('/dashboard/rt/pemetaan', [RtController::class, 'pemetaan'])->name('pemetaan.rt');
     Route::get('/dashboard/rt/petugas', [RtController::class, 'petugas'])->name('petugas.rt');
    Route::post('/dashboard/rt/petugas/tambah', [RtController::class, 'tambahPetugas'])->name('petugas.tambah.rt');
    // Route untuk menampilkan halaman edit
Route::get('/dashboard/rt/petugas/edit/{id}', [RtController::class, 'edit'])->name('petugas.edit.rt');
Route::post('/dashboard/rt/petugas/edit/{id}', [RtController::class, 'update'])->name('petugas.update.rt');
    Route::delete('/dashboard/rt/petugas/hapus/{id}', [RtController::class, 'hapusPetugas'])->name('petugas.hapus.rt');
    Route::get('/dashboard/rt/petugas/filter', [RtController::class, 'filterPetugas'])->name('petugas.filter.rt');
Route::get('/dashboard/rt/petugas/search', [RtController::class, 'searchPetugas'])->name('petugas.search.rt');
Route::post('/dashboard/rt/pengaduan/{id}/selesai', [RtController::class, 'selesaikanPengaduan'])->name('pengaduan.selesai.rt');
    Route::get('/pemerintah/rt', [RtController::class, 'pemerintahdesa'])->name('pemerintah.rt');
    Route::post('/pemerintah/rt/tambah', [RtController::class, 'tambahPemerintahDesa'])->name('pemerintah.tambah.rt');
    Route::get('/pemerintah/rt/edit/{id}', [RtController::class, 'editPemerintahDesa'])->name('pemerintah.edit.rt');
Route::put('/pemerintah/rt/update/{id}', [RtController::class, 'updatePemerintahDesa'])->name('pemerintah.update.rt');
Route::delete('/pemerintah/rt/hapus/{id}', [RtController::class, 'hapusPemerintahDesa'])->name('pemerintah.hapus.rt');
Route::get('/rt/pemerintah-desa/search', [RtController::class, 'searchPemerintahDesa'])->name('pemerintah.search.rt');
    Route::get('/rt/kependudukan', [RtController::class, 'kependudukan'])->name('kependudukan.rt');
    Route::post('/rt/kependudukan/tambah', [RtController::class, 'tambahKependudukan'])->name('kependudukan.tambah.rt');
    Route::get('/rt/kependudukan/edit/{id}', [RtController::class, 'editKependudukan'])->name('kependudukan.edit.rt');
    Route::put('/rt/kependudukan/update/{id}', [RtController::class, 'updateKependudukan'])->name('kependudukan.update.rt');
    Route::delete('/rt/kependudukan/hapus/{id}', [RtController::class, 'hapusKependudukan'])->name('kependudukan.hapus.rt');
    Route::get('/rt/kependudukan/search', [RtController::class, 'searchKependudukan'])->name('kependudukan.search.rt');
Route::get('/rt/kependudukan/sort', [RtController::class, 'sortKependudukan'])->name('kependudukan.sort.rt');
 Route::get('/dashboard/rt/kependudukan/export', [RtController::class, 'exportKependudukan'])->name('kependuduk.export.rt');
  Route::get('/rt/pengumuman', [RtController::class, 'pengumuman'])->name('pengumuman.rt');
    Route::post('/dashboard/rt/pengumuman/tambah', [RtController::class, 'tambahPengumuman'])->name('pengumuman.tambah.rt');
Route::delete('/dashboard/rt/pengumuman/{id}', [RtController::class, 'hapusPengumuman'])->name('pengumuman.hapus.rt');
Route::get('/dashboard/rt/pengumuman/edit/{id}', [RtController::class, 'editPengumuman'])->name('pengumuman.edit.rt');
Route::put('/dashboard/rt/pengumuman/update/{id}', [RtController::class, 'updatePengumuman'])->name('pengumuman.update.rt');
Route::put('/dashboard/rt/update-profile', [RtController::class, 'updateProfile'])->name('rt.updateProfile');
});