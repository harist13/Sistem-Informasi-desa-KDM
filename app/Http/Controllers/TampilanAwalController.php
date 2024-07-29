<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Dokumentasi; // Tambahkan ini

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
    public function rekapulasi()
    {
        return view('desa.pages.rekapulasipenduduk');
    }
     public function kegiatan()
    {
        $dokumentasi = Dokumentasi::with('petugas')->get(); // Ambil semua data dokumentasi
        return view('desa.pages.dokkegiatan', compact('dokumentasi'));
    }
}
