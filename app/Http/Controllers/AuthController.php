<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Petugas;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller

{
    public function loginAdmin()
    {
        return view('admin.login');
                                        
    }

    public function registerAdmin()
    {
        return view('admin.register');
    }

    public function loginMasyarakat()
    {
        return view('masyarakat.login');
    }

    public function registerMasyarakat()
    {
        return view('masyarakat.register');
    }

    public function handleMasyarakatLogin(Request $request)
{
    $credentials = $request->only('nik', 'password');

    if (Auth::guard('masyarakat')->attempt($credentials)) {
        return redirect()->intended('/dashboard/masyarakat');
    }

    return back()->withErrors([
        'nik' => 'NIK atau password salah.',
    ]);
}


   

    public function handleMasyarakatRegister(Request $request)
{
     $validator = Validator::make($request->all(), [
        'nik' => 'required|string|size:16|unique:masyarakat',
        'nama' => 'required|string|max:100',
        'password' => 'required|string|min:6|confirmed',
        'telp' => 'nullable|string|max:15',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'email' => 'nullable|string|email|max:100|unique:masyarakat',
    ], [
        'nik.required' => 'NIK wajib diisi.',
        'nik.string' => 'NIK harus berupa string.',
        'nik.size' => 'NIK harus terdiri dari 16 karakter.',
        'nik.unique' => 'NIK sudah terdaftar.',
        'nama.required' => 'Nama wajib diisi.',
        'nama.string' => 'Nama harus berupa string.',
        'nama.max' => 'Nama tidak boleh lebih dari 100 karakter.',
        'password.required' => 'Password wajib diisi.',
        'password.string' => 'Password harus berupa string.',
        'password.min' => 'Password minimal 6 karakter.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
        'telp.string' => 'Nomor telepon harus berupa string.',
        'telp.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',
        'foto.image' => 'File harus berupa gambar.',
        'foto.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif, svg.',
        'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        'email.string' => 'Email harus berupa string.',
        'email.email' => 'Format email tidak valid.',
        'email.max' => 'Email tidak boleh lebih dari 100 karakter.',
        'email.unique' => 'Email sudah terdaftar.',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Handle file upload
    $fotoPath = null;
    if ($request->hasFile('foto')) {
        $fotoPath = $request->file('foto')->store('public/fotos');
    }

    Masyarakat::create([
        'nik' => $request->nik,
        'nama' => $request->nama,
        'password' => Hash::make($request->password),
        'telp' => $request->telp,
        'foto' => $fotoPath,
        'email' => $request->email,
    ]);

    return redirect()->route('loginMasyarakat')->with('success', 'Registrasi berhasil. Silakan login.');
}


     

     public function handleAdminLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        
        if (Auth::guard('web')->attempt($credentials)) {
            // Determine the role of the authenticated user
            $user = Auth::user();
            
            if ($user->hasRole('admin')) {
                return redirect()->intended('/dashboard/admin');
            } elseif ($user->hasRole('staff')) {
                return redirect()->intended('/dashboard/staff');
            } elseif ($user->hasRole('rt')) { // Assuming 'rt' is a role
                return redirect()->intended('/dashboard/rt');
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
