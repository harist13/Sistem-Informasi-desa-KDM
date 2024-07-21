<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use App\Models\Tanggapan;

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
        $pengaduan = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)
            ->with('tanggapans.petugas')
            ->get();
        return view('masyarakat.components.pages.pengaduan', compact('pengaduan'));
    }

    public function pengajuanPengaduan(Request $request)
    {
        $request->validate([
            'tgl_pengaduan' => 'required|date',
            'isi_laporan' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->foto->extension();  
        $request->foto->move(public_path('images'), $imageName);

        Pengaduan::create([
            'tgl_pengaduan' => $request->tgl_pengaduan,
            'nik' => Auth::guard('masyarakat')->user()->nik,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $imageName,
            'status' => '0', // 0 untuk status belum diproses
        ]);

        return redirect()->route('pengaduan')->with('success', 'Pengaduan berhasil diajukan');
    }
 

}
