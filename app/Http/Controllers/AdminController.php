<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Petugas;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;


class AdminController extends Controller
{

   

   
     public function petugas()
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('public/petugas', $filename);
            $data['foto'] = $filename;
        }

        $data['password'] = Hash::make($request->password);

        $petugas = Petugas::create($data);
        $petugas->assignRole($request->role);

        return redirect()->route('petugas.admin')->with('success', 'Petugas berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama_petugas' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:petugas,username,' . $id,
            'password' => 'nullable|string|min:6',
            'telp' => 'nullable|string|max:15',
            'role' => 'required|exists:roles,name',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->except(['_token', 'password']);

        if ($request->hasFile('foto')) {
            // Delete old photo
            if ($petugas->foto) {
                Storage::delete('public/petugas/' . $petugas->foto);
            }

            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('public/petugas', $filename);
            $data['foto'] = $filename;
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $petugas->update($data);
        $petugas->syncRoles($request->role);

        return redirect()->route('petugas.admin')->with('success', 'Data petugas berhasil diperbarui.');
    }

     public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        $roles = Role::all();

        return view('admin.components.modals.petugas.editdata', compact('petugas', 'roles'));
    }



     public function hapusPetugas($id)
    {
        $petugas = Petugas::findOrFail($id);
        
        // Hapus roles yang terkait dengan petugas
        $petugas->roles()->detach();
        
        // Hapus petugas
        $petugas->delete();

        return redirect()->route('petugas.admin')->with('success', 'Petugas berhasil dihapus.');
    }

    public function filterPetugas(Request $request)
{
    $role = $request->role;
    $petugas = Petugas::whereHas('roles', function($query) use ($role) {
        $query->where('name', $role);
    })->get();

    $roles = Role::all();
    return view('admin.components.pages.petugas', compact('petugas', 'roles'));
}

public function searchPetugas(Request $request)
{
    $search = $request->search;
    $petugas = Petugas::where('nama_petugas', 'like', "%$search%")
                ->orWhere('username', 'like', "%$search%")
                ->get();

    $roles = Role::all();
    return view('admin.components.pages.petugas', compact('petugas', 'roles'));
}



    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function artikel()
    {
        return view('admin.components.pages.artikel');
    }
   

     public function pengaduan()
    {
        $pengaduan = Pengaduan::with('masyarakat')->where('status', '0')->get();
        return view('admin.components.pages.pengaduan', compact('pengaduan'));
    }

    public function pengaduandiproses()
    {
        $pengaduan = Pengaduan::with(['masyarakat', 'tanggapans'])
            ->whereIn('status', ['proses', 'selesai'])
            ->get();
        return view('admin.components.pages.pengaduandiproses', compact('pengaduan'));
    }

    public function pengaduanselesai()
    {
        $pengaduan = Pengaduan::with(['masyarakat', 'tanggapans'])
            ->where('status', 'selesai')
            ->get();
        return view('admin.components.pages.pengaduanselesai', compact('pengaduan'));
    }

    public function tanggapiPengaduan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tanggapan' => 'required|string',
            'status' => 'required|in:proses,selesai',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        Tanggapan::create([
            'id_pengaduan' => $id,
            'tgl_tanggapan' => now(),
            'tanggapan' => $request->tanggapan,
            'id_petugas' => auth()->id(),
        ]);

        return redirect()->route('pengaduan.admin')->with('success', 'Pengaduan berhasil ditanggapi.');
    }

    public function detailPengaduan($id)
    {
        $pengaduan = Pengaduan::with(['masyarakat', 'tanggapans'])->findOrFail($id);
        return view('admin.components.modals.pengaduan.detail', compact('pengaduan'));
    }

    public function hapusPengaduan($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();
        return redirect()->back()->with('success', 'Pengaduan berhasil dihapus.');
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