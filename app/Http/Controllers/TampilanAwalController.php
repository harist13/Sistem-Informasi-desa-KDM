<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Dokumentasi; // Tambahkan ini
use App\Models\Petugas; // Tambahkan ini
use App\Models\RekapulasiPenduduk;

class TampilanAwalController extends Controller
{
    public function index()
    {
        $artikels = Artikel::with('petugas')->latest()->take(3)->get();
        $artikelTerbaru = Artikel::latest()->take(3)->get();
        $dokumentasi = Dokumentasi::with('petugas')->get(); // Ambil semua data dokumentasi
        return view('index', compact('artikels', 'artikelTerbaru', 'dokumentasi'));
    }

    public function berita($id)
    {
        $artikel = Artikel::with('petugas')->findOrFail($id);
        $artikelTerbaru = Artikel::latest()->take(3)->get();
        return view('desa.pages.berita', compact('artikel', 'artikelTerbaru'));
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
        return view('desa.pages.pemerintahan');
    }
    public function detailPemerintahan()
    {
        return view('desa.pages.detailpem');
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
}
