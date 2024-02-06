<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
 public function login()
 {
  return view('login');
 }

 public function authentication(Request $request)
 {
  $credentials = $request->validate([
   'name' => ['required'],
   'password' => ['required'],
  ]);
        dd($credentials);

  if (Auth::attempt($credentials)) {
   if (Auth::user()->status != 'aktif') {
    // melarang user non-aktif masuk ke halaman homepage
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    Session::flash('status', 'gagal');
    Session::flash('pesan', 'mohon tunggu , akun anda sedang di verifikasi admin.');
    return redirect('/login');
   }

   $request->session()->regenerate();
   if (Auth::user()->role_id === 1) {
    return redirect('dashboard-admin');
   }

   if (Auth::user()->role_id === 2) {
    return redirect('pengunjung');
   }
  }

  Session::flash('status', 'gagal');
  Session::flash('pesan', 'Username / Password tidak terdaftar, silahkan register.');
  return redirect('/login');
 }

 public function register()
 {
  return view('register');
 }

 public function proses_register(Request $request)
 {
  $request->validate([
   'name' => 'required|unique:users|min:4|max:255',
   'password' => 'required|min:4|max:255',
   'telephone' => 'required|min:6|max:29',
   'alamat' => 'required'
  ]);

  $request['password'] = Hash::make($request->password);
  User::create($request->all());

  Session::flash('status', 'sukses');
  Session::flash('pesan', 'Registrasi berhasil, mohon tunggu admin sedang memverifikasi.');

  return redirect('login');
 }

 public function logout(Request $request)
 {
  Auth::logout();
  $request->session()->invalidate();
  $request->session()->regenerateToken();
  return redirect('/');
 }
}
