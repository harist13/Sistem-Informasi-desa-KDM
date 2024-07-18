<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Petugas;
use Spatie\Permission\Models\Role;

class StaffController extends Controller
{
     public function Staffpetugas()
    {
        $petugas = Petugas::all();
        $roles = Role::all();
        return view('admin.components.pages.petugas', compact('petugas', 'roles'));
    }

    public function tambahPetugas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_petugas' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:petugas',
            'password' => 'required|string|min:6',
            'telp' => 'nullable|string|max:15',
            'role' => 'required|exists:roles,name',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $petugas = Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
        ]);

        $petugas->assignRole($request->role);

        return redirect()->route('petugas.admin')->with('success', 'Petugas berhasil ditambahkan.');
    }


    public function Staffdashboard()
    {
        return view('admin.dashboard');
    }
    public function artikel()
    {
        return view('admin.components.pages.artikel');
    }
    public function pengaduan()
    {
        return view('admin.components.pages.pengaduan');
    }
    public function tanggapan()
    {
        return view('admin.components.pages.tanggapan');
    }
    
    public function penduduk()
    {
        return view('admin.components.pages.rumahtangga');
    }
    public function surat()
    {
        return view('admin.components.pages.surat');
    }
    public function pemetaan()
    {
        return view('admin.components.pages.pemetaan');
    }
}
