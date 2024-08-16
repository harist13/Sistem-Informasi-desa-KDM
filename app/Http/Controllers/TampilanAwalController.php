<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Dokumentasi; // Tambahkan ini
use App\Models\Petugas; // Tambahkan ini
use App\Models\RekapulasiPenduduk;
use App\Models\PemerintahDesa;
use App\Models\Kependudukan;
use App\Models\Pengumuman;

class TampilanAwalController extends Controller
{
    public function index()
{
    $artikels = Artikel::with('petugas')->latest()->take(3)->get();
    $artikelTerbaru = Artikel::latest()->take(3)->get();
    $dokumentasi = Dokumentasi::with('petugas')->get();
    $pemerintahdesas = PemerintahDesa::take(3)->get(); // Ambil 3 data pemerintah desa
    $pengumuman_terbaru = Pengumuman::with('petugas')->latest()->take(3)->get();
    return view('index', compact('artikels', 'artikelTerbaru', 'dokumentasi', 'pemerintahdesas', 'pengumuman_terbaru'));
}

    public function berita($id)
    {
        $artikel = Artikel::with('petugas')->findOrFail($id);
        $artikelTerbaru = Artikel::latest()->take(3)->get();
        $pemerintahdesas = PemerintahDesa::take(3)->get(); // Ambil 3 data pemerintah desa
        $pengumuman_terbaru = Pengumuman::with('petugas')->latest()->take(3)->get();
        return view('desa.pages.berita', compact('artikel', 'artikelTerbaru', 'pemerintahdesas', 'pengumuman_terbaru'));
    }

    public function sejarah()
    {
        return view('desa.pages.sejarah');
    }
    public function visimisi()
    {
        return view('desa.pages.visimisi');
    }
     public function pemerintahan()
    {
        $pemerintahdesas = PemerintahDesa::all();
        return view('desa.pages.pemerintahan', compact('pemerintahdesas'));
    }

    public function detailPemerintahan($id)
    {
        $pemerintahdesa = PemerintahDesa::findOrFail($id);
        return view('desa.pages.detailpem', compact('pemerintahdesa'));
    }
    public function wisata()
    {
        return view('desa.pages.wisata');
    }
    public function rekapulasi()
{
    $rekapulasi = RekapulasiPenduduk::with('petugas')->get();
    return view('desa.pages.rekapulasipenduduk', compact('rekapulasi'));
}
     public function kegiatan()
    {
        $dokumentasi = Dokumentasi::with('petugas')->get(); // Ambil semua data dokumentasi
        return view('desa.pages.dokkegiatan', compact('dokumentasi'));
    }

    public function searchPenduduk(Request $request)
{
    $search = $request->input('search');
    $rekapulasi = RekapulasiPenduduk::with('petugas')
        ->whereHas('petugas', function($query) use ($search) {
            $query->where('nama_petugas', 'like', "%$search%");
        })
        ->orWhere('RT', 'like', "%$search%")
        ->get();
    $petugas = Petugas::all();
    return view('desa.pages.rekapulasipenduduk', compact('rekapulasi', 'petugas'));
}

public function sortPenduduk(Request $request)
{
    $sort = $request->input('sort');
    $order = $request->input('order', 'asc');

    if ($sort === 'nama_petugas') {
        $rekapulasi = RekapulasiPenduduk::with(['petugas' => function($query) use ($order) {
            $query->orderBy('nama_petugas', $order);
        }])->get();
    } else {
        $rekapulasi = RekapulasiPenduduk::with('petugas')->orderBy($sort, $order)->get();
    }

    $petugas = Petugas::all();
    return view('desa.pages.rekapulasipenduduk', compact('rekapulasi', 'petugas'));
}

public function kpendudukan(Request $request)
{
    $search = $request->input('search');

    $kependudukans = Kependudukan::when($search, function ($query) use ($search) {
        return $query->where('rt_rw', 'like', "%$search%")
            ->orWhere('nama', 'like', "%$search%")
            ->orWhere('jenis_kelamin', 'like', "%$search%")
            ->orWhere('alamat', 'like', "%$search%")
            ->orWhere('kelurahan', 'like', "%$search%")
            ->orWhere('kecamatan', 'like', "%$search%")
            ->orWhere('kabupaten', 'like', "%$search%")
            ->orWhere('provinsi', 'like', "%$search%")
            ->orWhere('agama', 'like', "%$search%")
            ->orWhere('status_perkawinan', 'like', "%$search%")
            ->orWhere('pekerjaan', 'like', "%$search%")
            ->orWhere('status_penduduk', 'like', "%$search%");
    })->get();

    return view('desa.pages.kpendudukan', compact('kependudukans', 'search'));
}

public function sortKependudukan(Request $request)
{
    $sortBy = $request->input('sort_by', 'nama'); // Default sort by nama
    $sortOrder = $request->input('sort_order', 'asc'); // Default sort order ascending

    $kependudukans = Kependudukan::orderBy($sortBy, $sortOrder)->get();

    return view('desa.pages.kpendudukan', compact('kependudukans'));
}

public function pemetaan()
{
    return view('desa.pages.pemetaan');
}

public function beritadesa(Request $request)
{
    $search = $request->input('search');
    $artikels = Artikel::with('petugas')
        ->when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', "%$search%")
                ->orWhere('deskripsi', 'like', "%$search%");
        })
        ->latest()
        ->paginate(10);
    $artikelTerbaru = Artikel::latest()->take(3)->get();
    $pemerintahdesas = PemerintahDesa::take(3)->get();
    return view('desa.pages.beritadesa', compact('artikels', 'artikelTerbaru', 'pemerintahdesas'));
}

  public function pengumuman()
    {
        $pengumumans = Pengumuman::with('petugas')->get();
        return view('desa.pages.pengumuman', compact('pengumumans'));
    }

    public function detailPengumuman($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('desa.pages.detailpengumuman', compact('pengumuman'));
    }
}
