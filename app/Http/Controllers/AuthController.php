<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
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
            return redirect()->route('home');
        }
        return back()->withErrors(['nik' => 'Invalid credentials.']);
    }

    public function handleMasyarakatRegister(Request $request)
    {
        $data = $request->validate([
            'nik' => 'required|string|unique:masyarakat',
            'nama' => 'required|string|max:100',
            'password' => 'required|string|min:6|confirmed',
            'telp' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100',
        ]);

        $data['password'] = Hash::make($data['password']);
        Masyarakat::create($data);

        return redirect()->route('loginMasyarakat')->with('success', 'Registration successful.');
    }

    public function loginAdmin()
    {
        return view('admin.login');
    }

    public function registerAdmin()
    {
        return view('admin.register');
    }

    public function handleAdminLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['username' => 'Invalid credentials.']);
    }

    public function handleAdminRegister(Request $request)
    {
        $data = $request->validate([
            'nama_petugas' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:petugas',
            'password' => 'required|string|min:6|confirmed',
            'telp' => 'nullable|string|max:15',
            'role' => 'required|string|in:admin,editor,user',
        ]);

        $data['password'] = Hash::make($data['password']);
        Petugas::create($data);

        return redirect()->route('loginAdmin')->with('success', 'Registration successful.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
