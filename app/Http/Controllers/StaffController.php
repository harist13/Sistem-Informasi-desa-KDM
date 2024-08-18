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
use Illuminate\Support\Facades\Auth;


class StaffController extends Controller
{

   

   
     public function petugas()
    {
        $petugas = Petugas::all();
        $roles = Role::all();
        return view('staff.components.pages.petugas', compact('petugas', 'roles'));
    }

    
     public function tambahPetugas(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nama_petugas' => 'required|string|max:100',
        'username' => 'required|string|max:50|unique:petugas,username',
        'password' => 'required|string|min:6',
        'telp' => 'nullable|string|max:15|unique:petugas,telp',
        'role' => 'required|exists:roles,name',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'nama_petugas.required' => 'Nama petugas wajib diisi.',
        'nama_petugas.string' => 'Nama petugas harus berupa teks.',
        'nama_petugas.max' => 'Nama petugas maksimal 100 karakter.',
        'username.required' => 'Username wajib diisi.',
        'username.string' => 'Username harus berupa teks.',
        'username.max' => 'Username maksimal 50 karakter.',
        'username.unique' => 'Username sudah terdaftar.',
        'password.required' => 'Password wajib diisi.',
        'password.string' => 'Password harus berupa teks.',
        'password.min' => 'Password minimal 6 karakter.',
        'telp.string' => 'Nomor telepon harus berupa teks.',
        'telp.max' => 'Nomor telepon maksimal 15 karakter.',
        'telp.unique' => 'Nomor telepon sudah digunakan.',
        'role.required' => 'Role wajib diisi.',
        'role.exists' => 'Role yang dipilih tidak valid.',
        'foto.image' => 'Foto harus berupa file gambar.',
        'foto.mimes' => 'Foto harus berformat jpeg, png, jpg, atau gif.',
        'foto.max' => 'Ukuran foto maksimal 2MB.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('error', 'error, gagal menambahkan data silakan cek inputan kembali');
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

    return redirect()->route('petugas.staff')->with('success', 'Petugas berhasil ditambahkan.');
}

    public function update(Request $request, $id)
{
    $petugas = Petugas::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'nama_petugas' => 'required|string|max:100',
        'username' => 'required|string|max:50|unique:petugas,username,' . $id,
        'password' => 'nullable|string|min:6',
        'telp' => 'nullable|string|max:15|unique:petugas,telp,' . $id,
        'role' => 'required|exists:roles,name',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'nama_petugas.required' => 'Nama petugas wajib diisi.',
        'nama_petugas.string' => 'Nama petugas harus berupa teks.',
        'nama_petugas.max' => 'Nama petugas maksimal 100 karakter.',
        'username.required' => 'Username wajib diisi.',
        'username.string' => 'Username harus berupa teks.',
        'username.max' => 'Username maksimal 50 karakter.',
        'username.unique' => 'Username sudah terdaftar.',
        'password.string' => 'Password harus berupa teks.',
        'password.min' => 'Password minimal 6 karakter.',
        'telp.string' => 'Nomor telepon harus berupa teks.',
        'telp.max' => 'Nomor telepon maksimal 15 karakter.',
        'telp.unique' => 'Nomor telepon sudah terdaftar.',
        'role.required' => 'Role wajib diisi.',
        'role.exists' => 'Role yang dipilih tidak valid.',
        'foto.image' => 'Foto harus berupa file gambar.',
        'foto.mimes' => 'Foto harus berformat jpeg, png, jpg, atau gif.',
        'foto.max' => 'Ukuran foto maksimal 2MB.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('error', 'error, gagal memperbaharui data silakan cek inputan kembali');
    }

    $data = $request->except(['_token', 'password']);

    if ($request->hasFile('foto')) {
        // Hapus foto lama
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

    return redirect()->route('petugas.staff')->with('success', 'Data petugas berhasil diperbarui.');
}

     public function edit($id)
    {
        $petugas = Petugas::findOrFail($id);
        $roles = Role::all();

        return view('staff.components.modals.petugas.editdata', compact('petugas', 'roles'));
    }



     public function hapusPetugas($id)
    {
        $petugas = Petugas::findOrFail($id);
        
        // Hapus roles yang terkait dengan petugas
        $petugas->roles()->detach();
        
        // Hapus petugas
        $petugas->delete();

        return redirect()->route('petugas.staff')->with('success', 'Petugas berhasil dihapus.');
    }

    public function filterPetugas(Request $request)
{
    $role = $request->role;
    $petugas = Petugas::whereHas('roles', function($query) use ($role) {
        $query->where('name', $role);
    })->get();

    $roles = Role::all();
    return view('staff.components.pages.petugas', compact('petugas', 'roles'));
}

public function searchPetugas(Request $request)
{
    $search = $request->search;
    $petugas = Petugas::where('nama_petugas', 'like', "%$search%")
                ->orWhere('username', 'like', "%$search%")
                ->get();

    $roles = Role::all();
    return view('staff.components.pages.petugas', compact('petugas', 'roles'));
}



    public function dashboard()
    {
        return view('staff.dashboard');
    }
    

    public function artikel()
{
    $artikels = Artikel::with('petugas')->get();
    return view('staff.components.pages.artikel', compact('artikels'));
}

public function tambahArtikel(Request $request)
{
    $validator = Validator::make($request->all(), [
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'judul.required' => 'Judul wajib diisi.',
        'judul.string' => 'Judul harus berupa teks.',
        'judul.max' => 'Judul maksimal 255 karakter.',
        'deskripsi.required' => 'Deskripsi wajib diisi.',
        'deskripsi.string' => 'Deskripsi harus berupa teks.',
        'gambar.required' => 'Gambar wajib diunggah.',
        'gambar.image' => 'File harus berupa gambar.',
        'gambar.mimes' => 'Gambar harus berformat jpeg, png, jpg, atau gif.',
        'gambar.max' => 'Ukuran gambar maksimal 2MB.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('error', 'Artikel gagal ditambahkan. Silakan cek inputan kembali.');
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

    return redirect()->route('artikel.staff')->with('success', 'Artikel berhasil ditambahkan.');
}


public function editArtikel($id)
{
    $artikel = Artikel::findOrFail($id);
    return view('staff.components.modals.artikel.editdata', compact('artikel'));
}

public function updateArtikel(Request $request, $id)
{
    $artikel = Artikel::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'judul.required' => 'Judul wajib diisi.',
        'judul.string' => 'Judul harus berupa teks.',
        'judul.max' => 'Judul maksimal 255 karakter.',
        'deskripsi.required' => 'Deskripsi wajib diisi.',
        'deskripsi.string' => 'Deskripsi harus berupa teks.',
        'gambar.image' => 'File harus berupa gambar.',
        'gambar.mimes' => 'Gambar harus berformat jpeg, png, jpg, atau gif.',
        'gambar.max' => 'Ukuran gambar maksimal 2MB.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)
                     ->with('error', 'Artikel gagal diperbarui, silakan cek inputan kembali.')
                     ->withInput();
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

    return redirect()->route('artikel.staff')->with('success', 'Artikel berhasil diperbarui.');
}


public function hapusArtikel($id)
{
    $artikel = Artikel::findOrFail($id);
    
    // Delete image if exists
    if ($artikel->gambar) {
        Storage::delete('public/artikel/' . $artikel->gambar);
    }
    
    $artikel->delete();

    return redirect()->route('artikel.staff')->with('success', 'Artikel berhasil dihapus.');
}
   

     public function pengaduan()
    {
        $pengaduan = Pengaduan::with('masyarakat')->where('status', 'belum diproses')->get();
        return view('staff.components.pages.pengaduan', compact('pengaduan'));
    }

    public function pengaduandiproses()
    {
        $pengaduan = Pengaduan::with(['masyarakat', 'tanggapans'])
            ->whereIn('status', ['proses', 'selesai'])
            ->get();
        return view('staff.components.pages.pengaduandiproses', compact('pengaduan'));
    }

    public function pengaduanselesai()
    {
        $pengaduan = Pengaduan::with(['masyarakat', 'tanggapans'])
            ->where('status', 'selesai')
            ->get();
        return view('staff.components.pages.pengaduanselesai', compact('pengaduan'));
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

        return redirect()->route('pengaduan.staff')->with('success', 'Pengaduan berhasil ditanggapi.');
    }

    public function detailPengaduan($id)
    {
        $pengaduan = Pengaduan::with(['masyarakat', 'tanggapans'])->findOrFail($id);
        return view('staff.components.modals.pengaduan.detail', compact('pengaduan'));
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

    return redirect()->route('pengaduandiproses.staff')->with('success', 'Pengaduan berhasil diselesaikan.');
}
    
   

   
   
    public function pemetaan()
    {
        return view('staff.components.pages.pemetaan');
    }

    public function penduduk()
{
    $rekapulasi = RekapulasiPenduduk::with('petugas')->get();
    $petugas = Petugas::all();
    return view('staff.components.pages.datapenduduk', compact('rekapulasi', 'petugas'));
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
        'NELAYAN' => 'required|integer',
        'SWASTA' => 'required|integer',
        'ISLAM' => 'required|integer',
        'KHATOLIK' => 'required|integer',
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
        'KETERANGAN' => 'nullable|integer',
    ], [
        'required' => 'Data wajib diisi.',
        'string' => 'Data harus berupa teks.',
        'integer' => 'Data harus berupa angka.',
        'max' => 'Data tidak boleh lebih dari :max karakter.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('error', 'Rekapulasi gagal ditambahkan, silakan cek inputan kembali.');
    }

    $data = $request->all();
    $data['petugas_id'] = auth()->id(); // Mengambil ID petugas yang sedang login

    RekapulasiPenduduk::create($data);

    return redirect()->route('penduduk.staff')->with('success', 'Data penduduk berhasil ditambahkan.');
}


public function editPenduduk($id)
{
    $rekapulasi = RekapulasiPenduduk::findOrFail($id);
    $petugas = Petugas::all();
    return view('staff.components.modals.penduduk.editdata', compact('rekapulasi', 'petugas'));
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
        'NELAYAN' => 'required|integer',
        'SWASTA' => 'required|integer',
        'ISLAM' => 'required|integer',
        'KHATOLIK' => 'required|integer',
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
        'KETERANGAN' => 'nullable|integer',
    ], [
        'required' => 'Data harus diisi.',
        'string' => 'Data harus berupa teks.',
        'max' => 'Data tidak boleh lebih dari :max karakter.',
        'integer' => 'Data harus berupa angka.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->with('error', 'Rekapulasi gagal diperbarui, silakan cek inputan kembali.')->withInput();
    }

    $rekapulasi = RekapulasiPenduduk::findOrFail($id);
    $rekapulasi->update($request->all());

    return redirect()->route('penduduk.staff')->with('success', 'Data penduduk berhasil diperbarui.');
}




public function hapusPenduduk($id)
{
    $rekapulasi = RekapulasiPenduduk::findOrFail($id);
    $rekapulasi->delete();

    return redirect()->route('penduduk.staff')->with('success', 'Data penduduk berhasil dihapus.');
}

public function searchPenduduk(Request $request)
{
    $search = $request->input('search');
    
    $rekapulasi = RekapulasiPenduduk::where('nama_rt', 'LIKE', "%{$search}%")
                    ->orWhere('RT', 'LIKE', "%{$search}%")
                    ->get();

    $petugas = Petugas::all();

    return view('staff.components.pages.datapenduduk', compact('rekapulasi', 'petugas'));
}

public function sortPenduduk(Request $request)
{
    $sort = $request->input('sort', 'nama_rt');
    $order = $request->input('order', 'asc');

    $rekapulasi = RekapulasiPenduduk::orderBy($sort, $order)->get();
    $petugas = Petugas::all();

    return view('staff.components.pages.datapenduduk', compact('rekapulasi', 'petugas'));
}

public function dokumentasi()
{
    $dokumentasi = Dokumentasi::with('petugas')->get();
    return view('staff.components.pages.dokumentasi', compact('dokumentasi'));
}

public function tambahDokumentasi(Request $request)
{
    $validator = Validator::make($request->all(), [
        'judul' => 'required|string|max:255',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'judul.required' => 'Judul harus diisi.',
        'judul.string' => 'Judul harus berupa teks.',
        'judul.max' => 'Judul maksimal 255 karakter.',
        'foto.required' => 'Foto harus diunggah.',
        'foto.image' => 'File harus berupa gambar.',
        'foto.mimes' => 'Format foto harus jpeg, png, jpg, atau gif.',
        'foto.max' => 'Ukuran foto maksimal 2MB.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()
            ->with('error', 'Error, gagal menambahkan data. Silakan cek inputan kembali.');
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
    return redirect()->route('dokumentasi.staff')->with('success', 'Dokumentasi berhasil ditambahkan.');
}

public function editDokumentasi($id)
{
    $dokumentasi = Dokumentasi::findOrFail($id);
    return view('staff.components.modals.dokumentasi.editdata', compact('dokumentasi'));
}

public function updateDokumentasi(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'judul' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'judul.required' => 'Judul harus diisi.',
        'judul.string' => 'Judul harus berupa teks.',
        'judul.max' => 'Judul maksimal 255 karakter.',
        'foto.image' => 'File harus berupa gambar.',
        'foto.mimes' => 'Format foto harus jpeg, png, jpg, atau gif.',
        'foto.max' => 'Ukuran foto maksimal 2MB.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()
            ->with('error', 'Error, gagal memperbaharui data. Silakan cek inputan kembali.');
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
    return redirect()->route('dokumentasi.staff')->with('success', 'Dokumentasi berhasil diperbarui.');
}

public function hapusDokumentasi($id)
{
    $dokumentasi = Dokumentasi::findOrFail($id);
    
    // Hapus foto jika ada
    if ($dokumentasi->foto) {
        Storage::delete('public/dokumentasi/' . $dokumentasi->foto);
    }
    
    $dokumentasi->delete();

    return redirect()->route('dokumentasi.staff')->with('success', 'Dokumentasi berhasil dihapus.');
}

public function exportExcel()
{
    return Excel::download(new rekappenduduk, 'data_penduduk.xlsx');
}

 public function pemerintahdesa()
    {
        $pemerintahdesas = PemerintahDesa::with('petugas')->get();
        return view('staff.components.pages.pemerintahdesa', compact('pemerintahdesas'));
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
    ], [
        'nama.required' => 'Nama harus diisi.',
        'jabatan.required' => 'Jabatan harus diisi.',
        'NIP.required' => 'NIP harus diisi.',
        'Tempat_dan_tanggal_lahir.required' => 'Tempat dan tanggal lahir harus diisi.',
        'Agama.required' => 'Agama harus diisi.',
        'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
        'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
        'pendidikan.required' => 'Pendidikan harus diisi.',
        'alamat.required' => 'Alamat harus diisi.',
        'foto.required' => 'Foto harus diunggah.',
        'foto.image' => 'Foto harus berupa gambar.',
        'foto.mimes' => 'Foto harus dalam format jpeg, png, jpg, atau gif.',
        'foto.max' => 'Ukuran foto maksimal adalah 2MB.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('error', 'Error, gagal menambahkan data silakan cek inputan kembali.');
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

    return redirect()->route('pemerintah.staff')->with('success', 'Data pemerintah desa berhasil ditambahkan.');
}

    public function editPemerintahDesa($id)
{
    $pemerintahdesa = PemerintahDesa::findOrFail($id);
    return view('staff.components.modals.pemerintahdesa.editpemerintahdesa', compact('pemerintahdesa'));
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
    ], [
        'nama.required' => 'Nama harus diisi.',
        'jabatan.required' => 'Jabatan harus diisi.',
        'NIP.required' => 'NIP harus diisi.',
        'Tempat_dan_tanggal_lahir.required' => 'Tempat dan tanggal lahir harus diisi.',
        'Agama.required' => 'Agama harus diisi.',
        'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
        'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
        'pendidikan.required' => 'Pendidikan harus diisi.',
        'alamat.required' => 'Alamat harus diisi.',
        'foto.image' => 'Foto harus berupa gambar.',
        'foto.mimes' => 'Foto harus dalam format jpeg, png, jpg, atau gif.',
        'foto.max' => 'Ukuran foto maksimal adalah 2MB.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('error', 'Error, gagal memperbaharui data silakan cek inputan kembali.');
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

    return redirect()->route('pemerintah.staff')->with('success', 'Data pemerintah desa berhasil diperbarui.');
}

public function hapusPemerintahDesa($id)
{
    $pemerintahdesa = PemerintahDesa::findOrFail($id);
    
    // Hapus foto jika ada
    if ($pemerintahdesa->foto) {
        Storage::delete('public/pemerintahdesa/' . $pemerintahdesa->foto);
    }
    
    $pemerintahdesa->delete();

    return redirect()->route('pemerintah.staff')->with('success', 'Data pemerintah desa berhasil dihapus.');
}

public function searchPemerintahDesa(Request $request)
{
    $search = $request->input('search');
    
    $pemerintahdesas = PemerintahDesa::where('nama', 'LIKE', "%{$search}%")
                        ->orWhere('NIP', 'LIKE', "%{$search}%")
                        ->orWhere('jabatan', 'LIKE', "%{$search}%")
                        ->get();

    return view('staff.components.pages.pemerintahdesa', compact('pemerintahdesas'));
}

public function kependudukan()
{
    $kependudukans = Kependudukan::all();
    return view('staff.components.pages.kependudukan', compact('kependudukans'));
}

public function tambahKependudukan(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nik' => 'required|string|max:16|unique:kependudukan,nik',
        'nama' => 'required|string|max:255',
        'nama_rt' => 'required|string|max:255',
        'no_kk' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'umur' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string',
        'alamat' => 'required|string',
        'rt_rw' => 'required|string|max:10',
        'dusun' => 'required|string|max:255',
        'kelurahan' => 'required|string|max:255',
        'kecamatan' => 'required|string|max:255',
        'kabupaten' => 'required|string|max:255',
        'provinsi' => 'required|string|max:255',
        'agama' => 'required|string|max:50',
        'status_perkawinan' => 'required|string|max:50',
        'pekerjaan' => 'required|string|max:100',
        'pendidikan' => 'required|string|max:255',
        'kewarganegaraan' => 'required|string|max:255',
        'status_penduduk' => 'required|string|max:50',
    ], [
        'nik.required' => 'NIK harus diisi.',
        'nik.string' => 'NIK harus berupa teks.',
        'nik.max' => 'NIK maksimal 16 karakter.',
        'nik.unique' => 'NIK sudah terdaftar.',
        'nama.required' => 'Nama harus diisi.',
        'nama.string' => 'Nama harus berupa teks.',
        'nama.max' => 'Nama maksimal 255 karakter.',
        'nama_rt.required' => 'Nama rt harus diisi.',
        'nama_rt.string' => 'Nama rt harus berupa teks.',
        'nama_rt.max' => 'Nama rt maksimal 255 karakter.',
        'no_kk.required' => 'Nomor KK harus diisi.',
        'no_kk.string' => 'Nomor KK harus berupa teks.',
        'no_kk.max' => 'Nomor KK maksimal 255 karakter.',
        'foto.image' => 'File foto harus berupa gambar.',
        'foto.mimes' => 'Format foto harus jpeg, png, jpg, atau gif.',
        'foto.max' => 'Ukuran foto maksimal 2MB.',
        'tempat_lahir.required' => 'Tempat lahir harus diisi.',
        'tempat_lahir.string' => 'Tempat lahir harus berupa teks.',
        'tempat_lahir.max' => 'Tempat lahir maksimal 255 karakter.',
        'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
        'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal.',
        'umur.required' => 'Umur harus diisi.',
        'umur.string' => 'Umur harus berupa teks.',
        'umur.max' => 'Umur maksimal 255 karakter.',
        'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
        'jenis_kelamin.string' => 'Jenis kelamin harus berupa text.',
        'alamat.required' => 'Alamat harus diisi.',
        'alamat.string' => 'Alamat harus berupa teks.',
        'rt_rw.required' => 'RT/RW harus diisi.',
        'rt_rw.string' => 'RT/RW harus berupa teks.',
        'rt_rw.max' => 'RT/RW maksimal 10 karakter.',
        'dusun.required' => 'Dusun harus diisi.',
        'dusun.string' => 'Dusun harus berupa teks.',
        'dusun.max' => 'Dusun maksimal 255 karakter.',
        'kelurahan.required' => 'Kelurahan harus diisi.',
        'kelurahan.string' => 'Kelurahan harus berupa teks.',
        'kelurahan.max' => 'Kelurahan maksimal 255 karakter.',
        'kecamatan.required' => 'Kecamatan harus diisi.',
        'kecamatan.string' => 'Kecamatan harus berupa teks.',
        'kecamatan.max' => 'Kecamatan maksimal 255 karakter.',
        'kabupaten.required' => 'Kabupaten harus diisi.',
        'kabupaten.string' => 'Kabupaten harus berupa teks.',
        'kabupaten.max' => 'Kabupaten maksimal 255 karakter.',
        'provinsi.required' => 'Provinsi harus diisi.',
        'provinsi.string' => 'Provinsi harus berupa teks.',
        'provinsi.max' => 'Provinsi maksimal 255 karakter.',
        'agama.required' => 'Agama harus diisi.',
        'agama.string' => 'Agama harus berupa teks.',
        'agama.max' => 'Agama maksimal 50 karakter.',
        'status_perkawinan.required' => 'Status perkawinan harus diisi.',
        'status_perkawinan.string' => 'Status perkawinan harus berupa teks.',
        'status_perkawinan.max' => 'Status perkawinan maksimal 50 karakter.',
        'pekerjaan.required' => 'Pekerjaan harus diisi.',
        'pekerjaan.string' => 'Pekerjaan harus berupa teks.',
        'pekerjaan.max' => 'Pekerjaan maksimal 100 karakter.',
        'pendidikan.required' => 'Pendidikan harus diisi.',
        'pendidikan.string' => 'Pendidikan harus berupa teks.',
        'pendidikan.max' => 'Pendidikan maksimal 255 karakter.',
        'kewarganegaraan.required' => 'Kewarganegaraan harus diisi.',
        'kewarganegaraan.string' => 'Kewarganegaraan harus berupa teks.',
        'kewarganegaraan.max' => 'Kewarganegaraan maksimal 255 karakter.',
        'status_penduduk.required' => 'Status penduduk harus diisi.',
        'status_penduduk.string' => 'Status penduduk harus berupa teks.',
        'status_penduduk.max' => 'Status penduduk maksimal 50 karakter.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()
            ->with('error', 'Error, gagal menambahkan data. Silakan cek inputan kembali.');
    }

    $data = $request->all();
    $data['petugas_id'] = auth()->id();

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $path = $foto->storeAs('public/kependudukan', $filename);
        $data['foto'] = $filename;
    }

    $kependudukan = Kependudukan::create($data);
    
    // Update rekapitulasi
    $rekapulasi = RekapulasiPenduduk::firstOrCreate(
        ['RT' => $kependudukan->rt_rw],
        [
            'petugas_id' => auth()->id(),
            'nama_rt' => $kependudukan->nama_rt,
            'RT' => $kependudukan->rt_rw,
            'KK' => 0,
            'LAKI_LAKI' => 0,
            'PEREMPUAN' => 0,
            'BH' => 0,
            'BS' => 0,
            'TK' => 0,
            'SD' => 0,
            'SLTP' => 0,
            'SLTA' => 0,
            'PT' => 0,
            'TANI' => 0,
            'DAGANG' => 0,
            'PNS' => 0,
            'NELAYAN' => 0,
            'SWASTA' => 0,
            'ISLAM' => 0,
            'KHATOLIK' => 0,
            'PROTESTAN' => 0,
            'WNI' => 0,
            'WNA' => 0,
            'LK1' => 0,
            'PR1' => 0,
            'LK2' => 0,
            'PR2' => 0,
            'LK3' => 0,
            'PR3' => 0,
            'LK4' => 0,
            'PR4' => 0,
            'KK2' => 0,
            'LK5' => 0,
            'PR5' => 0,
            
        ]
    );
    
    $rekapulasi->increment('KK');
    $rekapulasi->increment($kependudukan->jenis_kelamin == 'LAKI-LAKI' ? 'LAKI_LAKI' : 'PEREMPUAN');
    $rekapulasi->increment(strtoupper($kependudukan->pendidikan));
    $rekapulasi->increment(strtoupper($kependudukan->pekerjaan));
    $rekapulasi->increment(strtoupper($kependudukan->agama));
    $rekapulasi->increment(strtoupper($kependudukan->kewarganegaraan));
    
    // Tambahkan logika untuk status_penduduk jika diperlukan
    // Logika untuk status_penduduk
    if ($kependudukan->status_penduduk == 'LAHIR') {
        if ($kependudukan->jenis_kelamin == 'LAKI-LAKI') {
            $rekapulasi->increment('LK1');
        } else {
            $rekapulasi->increment('PR1');
        }
    } elseif ($kependudukan->status_penduduk == 'MATI') {
        if ($kependudukan->jenis_kelamin == 'LAKI-LAKI') {
            $rekapulasi->increment('LK2');
        } else {
            $rekapulasi->increment('PR2');
        }
    } elseif ($kependudukan->status_penduduk == 'PINDAH') {
        if ($kependudukan->jenis_kelamin == 'LAKI-LAKI') {
            $rekapulasi->increment('LK3');
        } else {
            $rekapulasi->increment('PR3');
        }
    } elseif ($kependudukan->status_penduduk == 'DATANG') {
        if ($kependudukan->jenis_kelamin == 'LAKI-LAKI') {
            $rekapulasi->increment('LK4');
        } else {
            $rekapulasi->increment('PR4');
        }
    }
    
     // Hitung jumlah akhir dan jumlah jiwa
    $jumlahAkhirKK = $rekapulasi->KK;
    $jumlahAkhirLK = $rekapulasi->LK1 + $rekapulasi->LK2 + $rekapulasi->LK3 + $rekapulasi->LK4;
    $jumlahAkhirPR = $rekapulasi->PR1 + $rekapulasi->PR2 + $rekapulasi->PR3 + $rekapulasi->PR4;
    $jumlahJiwa = $jumlahAkhirLK + $jumlahAkhirPR;

    // Update kolom KK2, LK5, PR5, dan KETERANGAN
    $rekapulasi->KK2 = $jumlahAkhirKK;
    $rekapulasi->LK5 = $jumlahAkhirLK;
    $rekapulasi->PR5 = $jumlahAkhirPR;
    $rekapulasi->KETERANGAN = $jumlahJiwa;
    
    $rekapulasi->save();

    return redirect()->route('kependudukan.staff')->with('success', 'Data kependudukan berhasil ditambahkan.');
}


public function editKependudukan($id)
{
    $kependudukan = Kependudukan::findOrFail($id);
    return view('staff.components.modals.kependudukan.editkependudukan', compact('kependudukan'));
}

public function updateKependudukan(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'nik' => 'required|string|max:16|unique:kependudukan,nik,' . $id,
        'nama' => 'required|string|max:255',
        'nama_rt' => 'required|string|max:255',
        'no_kk' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'umur' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string',
        'alamat' => 'required|string',
        'rt_rw' => 'required|string|max:10',
        'dusun' => 'required|string|max:255',
        'kelurahan' => 'required|string|max:255',
        'kecamatan' => 'required|string|max:255',
        'kabupaten' => 'required|string|max:255',
        'provinsi' => 'required|string|max:255',
        'agama' => 'required|string|max:50',
        'status_perkawinan' => 'required|string|max:50',
        'pekerjaan' => 'required|string|max:100',
        'pendidikan' => 'required|string|max:255',
        'kewarganegaraan' => 'required|string|max:255',
        'status_penduduk' => 'required|string|max:50',
    ], [
        'nik.required' => 'NIK harus diisi.',
        'nik.string' => 'NIK harus berupa teks.',
        'nik.max' => 'NIK maksimal 16 karakter.',
        'nik.unique' => 'NIK sudah terdaftar.',
        'nama.required' => 'Nama harus diisi.',
        'nama.string' => 'Nama harus berupa teks.',
        'nama.max' => 'Nama maksimal 255 karakter.',
        'nama_rt.required' => 'Nama rt harus diisi.',
        'nama_rt.string' => 'Nama rt harus berupa teks.',
        'nama_rt.max' => 'Nama rt maksimal 255 karakter.',
        'no_kk.required' => 'Nomor KK harus diisi.',
        'no_kk.string' => 'Nomor KK harus berupa teks.',
        'no_kk.max' => 'Nomor KK maksimal 255 karakter.',
        'foto.image' => 'File foto harus berupa gambar.',
        'foto.mimes' => 'Format foto harus jpeg, png, jpg, atau gif.',
        'foto.max' => 'Ukuran foto maksimal 2MB.',
        'tempat_lahir.required' => 'Tempat lahir harus diisi.',
        'tempat_lahir.string' => 'Tempat lahir harus berupa teks.',
        'tempat_lahir.max' => 'Tempat lahir maksimal 255 karakter.',
        'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
        'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal.',
        'umur.required' => 'Umur harus diisi.',
        'umur.string' => 'Umur harus berupa teks.',
        'umur.max' => 'Umur maksimal 255 karakter.',
        'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
        'jenis_kelamin.string' => 'Jenis kelamin harus berupa text.',
        'alamat.required' => 'Alamat harus diisi.',
        'alamat.string' => 'Alamat harus berupa teks.',
        'rt_rw.required' => 'RT/RW harus diisi.',
        'rt_rw.string' => 'RT/RW harus berupa teks.',
        'rt_rw.max' => 'RT/RW maksimal 10 karakter.',
        'dusun.required' => 'Dusun harus diisi.',
        'dusun.string' => 'Dusun harus berupa teks.',
        'dusun.max' => 'Dusun maksimal 255 karakter.',
        'kelurahan.required' => 'Kelurahan harus diisi.',
        'kelurahan.string' => 'Kelurahan harus berupa teks.',
        'kelurahan.max' => 'Kelurahan maksimal 255 karakter.',
        'kecamatan.required' => 'Kecamatan harus diisi.',
        'kecamatan.string' => 'Kecamatan harus berupa teks.',
        'kecamatan.max' => 'Kecamatan maksimal 255 karakter.',
        'kabupaten.required' => 'Kabupaten harus diisi.',
        'kabupaten.string' => 'Kabupaten harus berupa teks.',
        'kabupaten.max' => 'Kabupaten maksimal 255 karakter.',
        'provinsi.required' => 'Provinsi harus diisi.',
        'provinsi.string' => 'Provinsi harus berupa teks.',
        'provinsi.max' => 'Provinsi maksimal 255 karakter.',
        'agama.required' => 'Agama harus diisi.',
        'agama.string' => 'Agama harus berupa teks.',
        'agama.max' => 'Agama maksimal 50 karakter.',
        'status_perkawinan.required' => 'Status perkawinan harus diisi.',
        'status_perkawinan.string' => 'Status perkawinan harus berupa teks.',
        'status_perkawinan.max' => 'Status perkawinan maksimal 50 karakter.',
        'pekerjaan.required' => 'Pekerjaan harus diisi.',
        'pekerjaan.string' => 'Pekerjaan harus berupa teks.',
        'pekerjaan.max' => 'Pekerjaan maksimal 100 karakter.',
        'pendidikan.required' => 'Pendidikan harus diisi.',
        'pendidikan.string' => 'Pendidikan harus berupa teks.',
        'pendidikan.max' => 'Pendidikan maksimal 255 karakter.',
        'kewarganegaraan.required' => 'Kewarganegaraan harus diisi.',
        'kewarganegaraan.string' => 'Kewarganegaraan harus berupa teks.',
        'kewarganegaraan.max' => 'Kewarganegaraan maksimal 255 karakter.',
        'status_penduduk.required' => 'Status penduduk harus diisi.',
        'status_penduduk.string' => 'Status penduduk harus berupa teks.',
        'status_penduduk.max' => 'Status penduduk maksimal 50 karakter.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()
            ->with('error', 'Error, gagal memperbaharui data. Silakan cek inputan kembali.');
    }

     $kependudukan = Kependudukan::findOrFail($id);
    $oldData = $kependudukan->toArray();
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

    // Update data kependudukan
    $kependudukan->update($data);

    // Update rekapitulasi
    $rekapulasi = RekapulasiPenduduk::where('RT', $kependudukan->rt_rw)->first();
    
    if ($rekapulasi) {
        // Mengurangi nilai lama
        $this->decrementRekapulasi($rekapulasi, $oldData);
        
        // Menambah nilai baru
        $this->incrementRekapulasi($rekapulasi, $kependudukan);
        
        // Hitung ulang jumlah akhir dan jumlah jiwa
        $this->recalculateRekapulasi($rekapulasi);
        
        $rekapulasi->save();
    }

    return redirect()->route('kependudukan.staff')->with('success', 'Data kependudukan berhasil diperbarui.');
}

private function decrementRekapulasi($rekapulasi, $oldData)
{
    $rekapulasi->decrement($oldData['jenis_kelamin'] == 'LAKI-LAKI' ? 'LAKI_LAKI' : 'PEREMPUAN');
    $rekapulasi->decrement(strtoupper($oldData['pendidikan']));
    $rekapulasi->decrement(strtoupper($oldData['pekerjaan']));
    $rekapulasi->decrement(strtoupper($oldData['agama']));
    $rekapulasi->decrement(strtoupper($oldData['kewarganegaraan']));
    
    // Kurangi status penduduk lama
    $this->decrementStatusPenduduk($rekapulasi, $oldData['status_penduduk'], $oldData['jenis_kelamin']);
}

private function incrementRekapulasi($rekapulasi, $newData)
{
    $rekapulasi->increment($newData->jenis_kelamin == 'LAKI-LAKI' ? 'LAKI_LAKI' : 'PEREMPUAN');
    $rekapulasi->increment(strtoupper($newData->pendidikan));
    $rekapulasi->increment(strtoupper($newData->pekerjaan));
    $rekapulasi->increment(strtoupper($newData->agama));
    $rekapulasi->increment(strtoupper($newData->kewarganegaraan));
    
    // Tambah status penduduk baru
    $this->incrementStatusPenduduk($rekapulasi, $newData->status_penduduk, $newData->jenis_kelamin);
}

private function decrementStatusPenduduk($rekapulasi, $status, $jenisKelamin)
{
    $column = $jenisKelamin == 'LAKI-LAKI' ? 'LK' : 'PR';
    switch ($status) {
        case 'LAHIR':
            $rekapulasi->decrement($column . '1');
            break;
        case 'MATI':
            $rekapulasi->decrement($column . '2');
            break;
        case 'PINDAH':
            $rekapulasi->decrement($column . '3');
            break;
        case 'DATANG':
            $rekapulasi->decrement($column . '4');
            break;
    }
}

private function incrementStatusPenduduk($rekapulasi, $status, $jenisKelamin)
{
    $column = $jenisKelamin == 'LAKI-LAKI' ? 'LK' : 'PR';
    switch ($status) {
        case 'LAHIR':
            $rekapulasi->increment($column . '1');
            break;
        case 'MATI':
            $rekapulasi->increment($column . '2');
            break;
        case 'PINDAH':
            $rekapulasi->increment($column . '3');
            break;
        case 'DATANG':
            $rekapulasi->increment($column . '4');
            break;
    }
}

private function recalculateRekapulasi($rekapulasi)
{
    $jumlahAkhirLK = $rekapulasi->LK1 + $rekapulasi->LK2 + $rekapulasi->LK3 + $rekapulasi->LK4;
    $jumlahAkhirPR = $rekapulasi->PR1 + $rekapulasi->PR2 + $rekapulasi->PR3 + $rekapulasi->PR4;
    $jumlahJiwa = $jumlahAkhirLK + $jumlahAkhirPR;

    $rekapulasi->LK5 = $jumlahAkhirLK;
    $rekapulasi->PR5 = $jumlahAkhirPR;
    $rekapulasi->KETERANGAN = $jumlahJiwa;
}


public function hapusKependudukan($id)
{
    $kependudukan = Kependudukan::findOrFail($id);
    $rekapulasi = RekapulasiPenduduk::where('RT', $kependudukan->rt_rw)->first();

    if ($rekapulasi) {
        // Kurangi nilai-nilai yang sesuai di rekapitulasi
        $rekapulasi->decrement('KK');
        $rekapulasi->decrement($kependudukan->jenis_kelamin == 'LAKI-LAKI' ? 'LAKI_LAKI' : 'PEREMPUAN');
        $rekapulasi->decrement(strtoupper($kependudukan->pendidikan));
        $rekapulasi->decrement(strtoupper($kependudukan->pekerjaan));
        $rekapulasi->decrement(strtoupper($kependudukan->agama));
        $rekapulasi->decrement(strtoupper($kependudukan->kewarganegaraan));

        // Kurangi nilai sesuai status_penduduk
        if ($kependudukan->status_penduduk == 'LAHIR') {
            $rekapulasi->decrement($kependudukan->jenis_kelamin == 'LAKI-LAKI' ? 'LK1' : 'PR1');
        } elseif ($kependudukan->status_penduduk == 'MATI') {
            $rekapulasi->decrement($kependudukan->jenis_kelamin == 'LAKI-LAKI' ? 'LK2' : 'PR2');
        } elseif ($kependudukan->status_penduduk == 'PINDAH') {
            $rekapulasi->decrement($kependudukan->jenis_kelamin == 'LAKI-LAKI' ? 'LK3' : 'PR3');
        } elseif ($kependudukan->status_penduduk == 'DATANG') {
            $rekapulasi->decrement($kependudukan->jenis_kelamin == 'LAKI-LAKI' ? 'LK4' : 'PR4');
        }

        // Hitung ulang jumlah akhir dan jumlah jiwa
        $jumlahAkhirKK = $rekapulasi->KK;
        $jumlahAkhirLK = $rekapulasi->LK1 + $rekapulasi->LK2 + $rekapulasi->LK3 + $rekapulasi->LK4;
        $jumlahAkhirPR = $rekapulasi->PR1 + $rekapulasi->PR2 + $rekapulasi->PR3 + $rekapulasi->PR4;
        $jumlahJiwa = $jumlahAkhirLK + $jumlahAkhirPR;

        // Update kolom KK2, LK5, PR5, dan KETERANGAN
        $rekapulasi->KK2 = $jumlahAkhirKK;
        $rekapulasi->LK5 = $jumlahAkhirLK;
        $rekapulasi->PR5 = $jumlahAkhirPR;
        $rekapulasi->KETERANGAN = $jumlahJiwa;

        $rekapulasi->save();

        // Jika semua data kependudukan untuk RT ini telah dihapus, hapus juga rekapitulasi
        if (Kependudukan::where('rt_rw', $kependudukan->rt_rw)->count() == 1) {
            $rekapulasi->delete();
        }
    }

    // Hapus foto jika ada
    if ($kependudukan->foto) {
        Storage::delete('public/kependudukan/' . $kependudukan->foto);
    }

    // Hapus data kependudukan
    $kependudukan->delete();

    return redirect()->route('kependudukan.staff')->with('success', 'Data kependudukan berhasil dihapus.');
}

public function searchKependudukan(Request $request)
{
    $search = $request->input('search');
    
    $kependudukans = Kependudukan::where('nik', 'LIKE', "%{$search}%")
                        ->orWhere('nama', 'LIKE', "%{$search}%")
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

    return view('staff.components.pages.kependudukan', compact('kependudukans'));
}

public function sortKependudukan(Request $request)
{
    $sortBy = $request->input('sort_by', 'nama'); // Default sort by nama
    $sortOrder = $request->input('sort_order', 'asc'); // Default sort order ascending

    $kependudukans = Kependudukan::orderBy($sortBy, $sortOrder)->get();

    return view('staff.components.pages.kependudukan', compact('kependudukans'));
}

public function exportKependudukan()
{
    return Excel::download(new KependudukanExport, 'data_kependudukan.xlsx');
}

public function pengumuman()
{
    $pengumumans = Pengumuman::all();
    return view('staff.components.pages.pengumuman', compact('pengumumans'));
}

public function tambahPengumuman(Request $request)
{
    $validator = Validator::make($request->all(), [
        'judul' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'file' => 'required|file|mimes:pdf,doc,docx,xlsx,xls',
    ], [
        'judul.required' => 'Judul pengumuman harus diisi.',
        'judul.string' => 'Judul pengumuman harus berupa teks.',
        'judul.max' => 'Judul pengumuman tidak boleh lebih dari 255 karakter.',
        'tanggal.required' => 'Tanggal pengumuman harus diisi.',
        'tanggal.date' => 'Tanggal pengumuman harus berupa tanggal yang valid.',
        'file.required' => 'File pengumuman harus diunggah.',
        'file.file' => 'File yang diunggah harus berupa file.',
        'file.mimes' => 'File pengumuman harus berformat: pdf, doc, docx, xlsx, atau xls.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('error', 'Gagal menambahkan data, silakan cek inputan kembali.');
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

    return redirect()->route('pengumuman.staff')->with('success', 'Pengumuman berhasil ditambahkan.');
}

public function hapusPengumuman($id)
{
    $pengumuman = Pengumuman::findOrFail($id);
    
    // Hapus file jika ada
    if ($pengumuman->file) {
        Storage::delete('public/pengumuman/' . $pengumuman->file);
    }
    
    $pengumuman->delete();

    return redirect()->route('pengumuman.staff')->with('success', 'Pengumuman berhasil dihapus.');
}

public function editPengumuman($id)
{
    $pengumuman = Pengumuman::findOrFail($id);
    return view('staff.components.modals.pengumuman.edit', compact('pengumuman'));
}

public function updatePengumuman(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'judul' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'file' => 'nullable|file|mimes:pdf,doc,docx,xlsx,xls',
    ], [
        'judul.required' => 'Judul pengumuman harus diisi.',
        'judul.string' => 'Judul pengumuman harus berupa teks.',
        'judul.max' => 'Judul pengumuman tidak boleh lebih dari 255 karakter.',
        'tanggal.required' => 'Tanggal pengumuman harus diisi.',
        'tanggal.date' => 'Tanggal pengumuman harus berupa tanggal yang valid.',
        'file.file' => 'File yang diunggah harus berupa file.',
        'file.mimes' => 'File pengumuman harus berformat: pdf, doc, docx, xlsx, atau xls.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput()->with('error', 'Gagal memperbaharui data, silakan cek inputan kembali.');
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

    return redirect()->route('pengumuman.staff')->with('success', 'Pengumuman berhasil diperbarui.');
}

 public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'nama_petugas' => 'required|string|max:100',
            'password' => 'nullable|string|min:6',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->nama_petugas = $request->nama_petugas;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::delete('public/petugas/' . $user->foto);
            }

            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $path = $foto->storeAs('public/petugas', $filename);
            $user->foto = $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}

