<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TampilanAwalController extends Controller
{
    public function sejarah()
    {
        return view('desa.pages.sejarah');
    }
    public function berita()
    {
        return view('desa.pages.berita');
    }
}
