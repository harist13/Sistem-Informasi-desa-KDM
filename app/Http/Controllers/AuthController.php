<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Petugas;

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
            'foto' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:100|unique:masyarakat',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Masyarakat::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'foto' => $request->foto,
            'email' => $request->email,
        ]);

        return redirect()->route('loginMasyarakat')->with('success', 'Registrasi berhasil. Silakan login.');
    }

     public function handleAdminLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended('/dashboard/admin');
        }

        return back()->withErrors([
            'username' => 'Username or password is incorrect.',
        ]);
    }

    public function handleAdminRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_petugas' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:petugas',
            'password' => 'required|string|min:6|confirmed',
            'telp' => 'nullable|string|max:15',
            'foto' => 'nullable|string|max:255',
            'role' => 'required|string|exists:roles,name', // assuming you have a roles table
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $petugas = Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'foto' => $request->foto,
            'role' => $request->role,
        ]);

        $petugas->assignRole($request->role);

        return redirect()->route('loginAdmin')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
