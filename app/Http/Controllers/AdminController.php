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
use App\Models\Artikel;
use App\Models\Penduduk;
use App\Models\RekapulasiPenduduk;


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
    $artikels = Artikel::with('petugas')->get();
    return view('admin.components.pages.artikel', compact('artikels'));
}

public function tambahArtikel(Request $request)
{
    $validator = Validator::make($request->all(), [
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $data = $request->all();
    $data['id_petugas'] = auth()->id();
    $data['tanggal_upload'] = now();

    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $filename = time() . '.' . $gambar->getClientOriginalExtension();
        $path = $gambar->storeAs('public/artikel', $filename);
        $data['gambar'] = $filename;
    }

    Artikel::create($data);

    return redirect()->route('artikel.admin')->with('success', 'Artikel berhasil ditambahkan.');
}

public function editArtikel($id)
{
    $artikel = Artikel::findOrFail($id);
    return view('admin.components.modals.artikel.editdata', compact('artikel'));
}

public function updateArtikel(Request $request, $id)
{
    $artikel = Artikel::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $data = $request->except(['_token', '_method']);

    if ($request->hasFile('gambar')) {
        // Delete old image
        if ($artikel->gambar) {
            Storage::delete('public/artikel/' . $artikel->gambar);
        }

        $gambar = $request->file('gambar');
        $filename = time() . '.' . $gambar->getClientOriginalExtension();
        $path = $gambar->storeAs('public/artikel', $filename);
        $data['gambar'] = $filename;
    }

    $artikel->update($data);

    return redirect()->route('artikel.admin')->with('success', 'Artikel berhasil diperbarui.');
}

public function hapusArtikel($id)
{
    $artikel = Artikel::findOrFail($id);
    
    // Delete image if exists
    if ($artikel->gambar) {
        Storage::delete('public/artikel/' . $artikel->gambar);
    }
    
    $artikel->delete();

    return redirect()->route('artikel.admin')->with('success', 'Artikel berhasil dihapus.');
}
   

     public function pengaduan()
    {
        $pengaduan = Pengaduan::with('masyarakat')->where('status', 'belum diproses')->get();
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

    public function selesaikanPengaduan(Request $request, $id)
{
    $pengaduan = Pengaduan::findOrFail($id);
    $pengaduan->status = 'selesai';
    $pengaduan->save();

    return redirect()->route('pengaduandiproses.admin')->with('success', 'Pengaduan berhasil diselesaikan.');
}
    
   

   
    public function surat()
    {
        return view('admin.components.pages.surat');
    }
    public function pemetaan()
    {
        return view('admin.components.pages.pemetaan');
    }

    public function penduduk()
{
    $rekapulasi = RekapulasiPenduduk::with('petugas')->get();
    $petugas = Petugas::all();
    return view('admin.components.pages.datapenduduk', compact('rekapulasi', 'petugas'));
}

public function tambahPenduduk(Request $request)
{
    $validator = Validator::make($request->all(), [
        'petugas_id' => 'required|exists:petugas,id',
        'RT' => 'required|string',
        'KK' => 'required|integer',
        'LAKI_LAKI' => 'required|integer',
        'PEREMPUAN' => 'required|integer',
        'BH' => 'required|integer',
        'BS' => 'required|integer',
        'TK' => 'required|integer',
        'SD' => 'required|integer',
        'SLTP' => 'required|integer',
        'SLTA' => 'required|integer',
        'PT' => 'required|integer',
        'TANI' => 'required|integer',
        'DAGANG' => 'required|integer',
        'PNS' => 'required|integer',
        'TNI' => 'required|integer',
        'SWASTA' => 'required|integer',
        'ISLAM' => 'required|integer',
        'KHALOTIK' => 'required|integer',
        'PROTESTAN' => 'required|integer',
        'WNI' => 'required|integer',
        'WNA' => 'required|integer',
        'LK1' => 'required|integer',
        'PR1' => 'required|integer',
        'LK2' => 'required|integer',
        'PR2' => 'required|integer',
        'LK3' => 'required|integer',
        'PR3' => 'required|integer',
        'LK4' => 'required|integer',
        'PR4' => 'required|integer',
        'KK2' => 'required|integer',
        'LK5' => 'required|integer',
        'PR5' => 'required|integer',
        'KETERANGAN' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    RekapulasiPenduduk::create($request->all());

    return redirect()->route('penduduk.admin')->with('success', 'Data penduduk berhasil ditambahkan.');
}

public function editPenduduk($id)
{
    $rekapulasi = RekapulasiPenduduk::findOrFail($id);
    $petugas = Petugas::all();
    return view('admin.components.modals.penduduk.editdata', compact('rekapulasi', 'petugas'));
}

public function updatePenduduk(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'petugas_id' => 'required|exists:petugas,id',
        'RT' => 'required|string',
        'KK' => 'required|integer',
        'LAKI_LAKI' => 'required|integer',
        'PEREMPUAN' => 'required|integer',
        'BH' => 'required|integer',
        'BS' => 'required|integer',
        'TK' => 'required|integer',
        'SD' => 'required|integer',
        'SLTP' => 'required|integer',
        'SLTA' => 'required|integer',
        'PT' => 'required|integer',
        'TANI' => 'required|integer',
        'DAGANG' => 'required|integer',
        'PNS' => 'required|integer',
        'TNI' => 'required|integer',
        'SWASTA' => 'required|integer',
        'ISLAM' => 'required|integer',
        'KHALOTIK' => 'required|integer',
        'PROTESTAN' => 'required|integer',
        'WNI' => 'required|integer',
        'WNA' => 'required|integer',
        'LK1' => 'required|integer',
        'PR1' => 'required|integer',
        'LK2' => 'required|integer',
        'PR2' => 'required|integer',
        'LK3' => 'required|integer',
        'PR3' => 'required|integer',
        'LK4' => 'required|integer',
        'PR4' => 'required|integer',
        'KK2' => 'required|integer',
        'LK5' => 'required|integer',
        'PR5' => 'required|integer',
        'KETERANGAN' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $rekapulasi = RekapulasiPenduduk::findOrFail($id);
    $rekapulasi->update($request->all());

    return redirect()->route('penduduk.admin')->with('success', 'Data penduduk berhasil diperbarui.');
}

public function hapusPenduduk($id)
{
    $rekapulasi = RekapulasiPenduduk::findOrFail($id);
    $rekapulasi->delete();

    return redirect()->route('penduduk.admin')->with('success', 'Data penduduk berhasil dihapus.');
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
    return view('admin.components.pages.datapenduduk', compact('rekapulasi', 'petugas'));
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
    return view('admin.components.pages.datapenduduk', compact('rekapulasi', 'petugas'));
}


}

