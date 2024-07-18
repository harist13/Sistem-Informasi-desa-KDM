<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function masyarakatDashboard()
    {
        return view('masyarakat.dashboard');
    }

    public function masyarakatartikel()
    {
        return view('masyarakat.components.pages.artikel');
    }
    public function masyarakatpengaduan()
    {
        return view('masyarakat.components.pages.pengaduan');
    }
 

}
