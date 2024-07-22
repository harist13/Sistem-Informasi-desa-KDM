<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class TampilanAwalController extends Controller
{
    public function index()
    {
        $artikels = Artikel::with('petugas')->latest()->take(3)->get();
        $artikelTerbaru = Artikel::latest()->take(3)->get();
        return view('index', compact('artikels', 'artikelTerbaru'));
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
    public function kegiatan()
    {
        return view('desa.pages.dokkegiatan');
    }
}
