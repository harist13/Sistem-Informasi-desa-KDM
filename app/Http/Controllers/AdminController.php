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
use App\Models\Dokumentasi;
use App\Exports\rekappenduduk;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PemerintahDesa;
use App\Models\Kependudukan;
use App\Exports\KependudukanExport;
use App\Models\Pengumuman;


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

public function tambahDataPenduduk(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nama_rt' => 'required|string|max:255',
        'RT' => 'required|string|max:10',
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

    $data = $request->all();
    $data['petugas_id'] = auth()->id(); // Assuming the logged-in user is the petugas

    RekapulasiPenduduk::create($data);

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
        'nama_rt' => 'required|string|max:255',
        'RT' => 'required|string|max:10',
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
    
    $rekapulasi = RekapulasiPenduduk::where('nama_rt', 'LIKE', "%{$search}%")
                    ->orWhere('RT', 'LIKE', "%{$search}%")
                    ->get();

    $petugas = Petugas::all();

    return view('admin.components.pages.datapenduduk', compact('rekapulasi', 'petugas'));
}

public function sortPenduduk(Request $request)
{
    $sort = $request->input('sort', 'nama_rt');
    $order = $request->input('order', 'asc');

    $rekapulasi = RekapulasiPenduduk::orderBy($sort, $order)->get();
    $petugas = Petugas::all();

    return view('admin.components.pages.datapenduduk', compact('rekapulasi', 'petugas'));
}

public function dokumentasi()
{
    $dokumentasi = Dokumentasi::with('petugas')->get();
    return view('admin.components.pages.dokumentasi', compact('dokumentasi'));
}

public function tambahDokumentasi(Request $request)
{
    $validator = Validator::make($request->all(), [
        'judul' => 'required|string|max:255',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $data = $request->all();
    $data['id_petugas'] = auth()->id();

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $path = $foto->storeAs('public/dokumentasi', $filename);
        $data['foto'] = $filename;
    }

    Dokumentasi::create($data);

    return redirect()->route('dokumentasi.admin')->with('success', 'Dokumentasi berhasil ditambahkan.');
}

public function editDokumentasi($id)
{
    $dokumentasi = Dokumentasi::findOrFail($id);
    return view('admin.components.modals.dokumentasi.editdata', compact('dokumentasi'));
}

public function updateDokumentasi(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'judul' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $dokumentasi = Dokumentasi::findOrFail($id);
    $data = $request->only(['judul']);

    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($dokumentasi->foto) {
            Storage::delete('public/dokumentasi/' . $dokumentasi->foto);
        }

        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $path = $foto->storeAs('public/dokumentasi', $filename);
        $data['foto'] = $filename;
    }

    $dokumentasi->update($data);

    return redirect()->route('dokumentasi.admin')->with('success', 'Dokumentasi berhasil diperbarui.');
}

public function hapusDokumentasi($id)
{
    $dokumentasi = Dokumentasi::findOrFail($id);
    
    // Hapus foto jika ada
    if ($dokumentasi->foto) {
        Storage::delete('public/dokumentasi/' . $dokumentasi->foto);
    }
    
    $dokumentasi->delete();

    return redirect()->route('dokumentasi.admin')->with('success', 'Dokumentasi berhasil dihapus.');
}

public function exportExcel()
{
    return Excel::download(new rekappenduduk, 'data_penduduk.xlsx');
}

 public function pemerintahdesa()
    {
        $pemerintahdesas = PemerintahDesa::with('petugas')->get();
        return view('admin.components.pages.pemerintahdesa', compact('pemerintahdesas'));
    }

    public function tambahPemerintahDesa(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'NIP' => 'required|string|max:255',
            'Tempat_dan_tanggal_lahir' => 'required|string|max:255',
            'Agama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'pendidikan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['petugas_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('public/pemerintahdesa', $filename);
            $data['foto'] = $filename;
        }

        PemerintahDesa::create($data);

        return redirect()->route('pemerintah.admin')->with('success', 'Data pemerintah desa berhasil ditambahkan.');
    }

    public function editPemerintahDesa($id)
{
    $pemerintahdesa = PemerintahDesa::findOrFail($id);
    return view('admin.components.modals.pemerintahdesa.editpemerintahdesa', compact('pemerintahdesa'));
}

public function updatePemerintahDesa(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'nama' => 'required|string|max:255',
        'jabatan' => 'required|string|max:255',
        'NIP' => 'required|string|max:255',
        'Tempat_dan_tanggal_lahir' => 'required|string|max:255',
        'Agama' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'pendidikan' => 'required|string|max:255',
        'alamat' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $pemerintahdesa = PemerintahDesa::findOrFail($id);
    $data = $request->except(['_token', '_method', 'foto']);

    if ($request->hasFile('foto')) {
        // Hapus foto lama
        if ($pemerintahdesa->foto) {
            Storage::delete('public/pemerintahdesa/' . $pemerintahdesa->foto);
        }

        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $path = $foto->storeAs('public/pemerintahdesa', $filename);
        $data['foto'] = $filename;
    }

    $pemerintahdesa->update($data);

    return redirect()->route('pemerintah.admin')->with('success', 'Data pemerintah desa berhasil diperbarui.');
}

public function hapusPemerintahDesa($id)
{
    $pemerintahdesa = PemerintahDesa::findOrFail($id);
    
    // Hapus foto jika ada
    if ($pemerintahdesa->foto) {
        Storage::delete('public/pemerintahdesa/' . $pemerintahdesa->foto);
    }
    
    $pemerintahdesa->delete();

    return redirect()->route('pemerintah.admin')->with('success', 'Data pemerintah desa berhasil dihapus.');
}

public function searchPemerintahDesa(Request $request)
{
    $search = $request->input('search');
    
    $pemerintahdesas = PemerintahDesa::where('nama', 'LIKE', "%{$search}%")
                        ->orWhere('NIP', 'LIKE', "%{$search}%")
                        ->orWhere('jabatan', 'LIKE', "%{$search}%")
                        ->get();

    return view('admin.components.pages.pemerintahdesa', compact('pemerintahdesas'));
}

public function kependudukan()
{
    $kependudukans = Kependudukan::all();
    return view('admin.components.pages.kependudukan', compact('kependudukans'));
}

public function tambahKependudukan(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nik' => 'required|string|max:16|unique:kependudukan,nik',
        'nama' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'alamat' => 'required|string',
        'rt_rw' => 'required|string|max:10',
        'kelurahan' => 'required|string|max:255',
        'kecamatan' => 'required|string|max:255',
        'kabupaten' => 'required|string|max:255',
        'provinsi' => 'required|string|max:255',
        'agama' => 'required|string|max:50',
        'status_perkawinan' => 'required|string|max:50',
        'pekerjaan' => 'required|string|max:100',
        'status_penduduk' => 'required|string|max:50',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $data = $request->all();
    $data['petugas_id'] = auth()->id();

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $path = $foto->storeAs('public/kependudukan', $filename);
        $data['foto'] = $filename;
    }

    Kependudukan::create($data);

    return redirect()->route('kependudukan.admin')->with('success', 'Data kependudukan berhasil ditambahkan.');
}

public function editKependudukan($id)
{
    $kependudukan = Kependudukan::findOrFail($id);
    return view('admin.components.modals.kependudukan.editkependudukan', compact('kependudukan'));
}

public function updateKependudukan(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'nik' => 'required|string|max:16|unique:kependudukan,nik,' . $id,
        'nama' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'alamat' => 'required|string',
        'rt_rw' => 'required|string|max:10',
        'kelurahan' => 'required|string|max:255',
        'kecamatan' => 'required|string|max:255',
        'kabupaten' => 'required|string|max:255',
        'provinsi' => 'required|string|max:255',
        'agama' => 'required|string|max:50',
        'status_perkawinan' => 'required|string|max:50',
        'pekerjaan' => 'required|string|max:100',
        'status_penduduk' => 'required|string|max:50',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $kependudukan = Kependudukan::findOrFail($id);
    $data = $request->except(['_token', '_method', 'foto']);

    if ($request->hasFile('foto')) {
        if ($kependudukan->foto) {
            Storage::delete('public/kependudukan/' . $kependudukan->foto);
        }

        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $path = $foto->storeAs('public/kependudukan', $filename);
        $data['foto'] = $filename;
    }

    $kependudukan->update($data);

    return redirect()->route('kependudukan.admin')->with('success', 'Data kependudukan berhasil diperbarui.');
}

public function hapusKependudukan($id)
{
    $kependudukan = Kependudukan::findOrFail($id);
    
    if ($kependudukan->foto) {
        Storage::delete('public/kependudukan/' . $kependudukan->foto);
    }
    
    $kependudukan->delete();

    return redirect()->route('kependudukan.admin')->with('success', 'Data kependudukan berhasil dihapus.');
}

public function searchKependudukan(Request $request)
{
    $search = $request->input('search');
    
    $kependudukans = Kependudukan::where('nik', 'LIKE', "%{$search}%")
                        ->orWhere('nama', 'LIKE', "%{$search}%")
                        ->orWhere('tempat_lahir', 'LIKE', "%{$search}%")
                        ->orWhere('tanggal_lahir', 'LIKE', "%{$search}%")
                        ->orWhere('jenis_kelamin', 'LIKE', "%{$search}%")
                        ->orWhere('alamat', 'LIKE', "%{$search}%")
                        ->orWhere('rt_rw', 'LIKE', "%{$search}%")
                        ->orWhere('kelurahan', 'LIKE', "%{$search}%")
                        ->orWhere('kecamatan', 'LIKE', "%{$search}%")
                        ->orWhere('kabupaten', 'LIKE', "%{$search}%")
                        ->orWhere('provinsi', 'LIKE', "%{$search}%")
                        ->orWhere('agama', 'LIKE', "%{$search}%")
                        ->orWhere('status_perkawinan', 'LIKE', "%{$search}%")
                        ->orWhere('pekerjaan', 'LIKE', "%{$search}%")
                        ->orWhere('status_penduduk', 'LIKE', "%{$search}%")
                        ->get();

    return view('admin.components.pages.kependudukan', compact('kependudukans'));
}

public function sortKependudukan(Request $request)
{
    $sortBy = $request->input('sort_by', 'nama'); // Default sort by nama
    $sortOrder = $request->input('sort_order', 'asc'); // Default sort order ascending

    $kependudukans = Kependudukan::orderBy($sortBy, $sortOrder)->get();

    return view('admin.components.pages.kependudukan', compact('kependudukans'));
}

public function exportKependudukan()
{
    return Excel::download(new KependudukanExport, 'data_kependudukan.xlsx');
}

public function pengumuman()
{
    $pengumumans = Pengumuman::all();
    return view('admin.components.pages.pengumuman', compact('pengumumans'));
}

public function tambahPengumuman(Request $request)
{
    $validator = Validator::make($request->all(), [
        'judul' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'file' => 'required|file|mimes:pdf,doc,docx,xlsx,xls',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $data = $request->all();
    $data['petugas_id'] = auth()->id();

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/pengumuman', $filename);
        $data['file'] = $filename;
    }

    Pengumuman::create($data);

    return redirect()->route('pengumuman.admin')->with('success', 'Pengumuman berhasil ditambahkan.');
}

public function hapusPengumuman($id)
{
    $pengumuman = Pengumuman::findOrFail($id);
    
    // Hapus file jika ada
    if ($pengumuman->file) {
        Storage::delete('public/pengumuman/' . $pengumuman->file);
    }
    
    $pengumuman->delete();

    return redirect()->route('pengumuman.admin')->with('success', 'Pengumuman berhasil dihapus.');
}

public function editPengumuman($id)
{
    $pengumuman = Pengumuman::findOrFail($id);
    return view('admin.components.modals.pengumuman.edit', compact('pengumuman'));
}

public function updatePengumuman(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'judul' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'file' => 'nullable|file|mimes:pdf,doc,docx,xlsx,xls',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $pengumuman = Pengumuman::findOrFail($id);
    $data = $request->except(['_token', '_method']);

    if ($request->hasFile('file')) {
        // Hapus file lama
        if ($pengumuman->file) {
            Storage::delete('public/pengumuman/' . $pengumuman->file);
        }

        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/pengumuman', $filename);
        $data['file'] = $filename;
    }

    $pengumuman->update($data);

    return redirect()->route('pengumuman.admin')->with('success', 'Pengumuman berhasil diperbarui.');
}
}

