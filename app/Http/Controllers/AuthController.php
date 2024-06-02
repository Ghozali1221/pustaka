<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
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
   'email' => ['required'],
   'password' => ['required'],
  ]);

  if (Auth::attempt($credentials)) {
   if (Auth::user()->status != 'aktif') {

    // melarang user non-aktif masuk ke halaman homepage karena akun belum di verifikasi admin
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    Session::flash('status', 'gagal');
    Session::flash('pesan', 'mohon tunggu , akun anda sedang di verifikasi admin.');
    return redirect()->to('/login');
   }

   $request->session()->regenerate();
   if (Auth::user()->role_id === 1) {
    return redirect()->to('dashboard-admin');
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
   'alamat' => 'required',
   'email' => 'required'
  ]);

  $request['password'] = Hash::make($request->password);
  User::create($request->all());

// membuat event/kegiatan jika berhasil registrasi dan di masukkan ke dalam database activity_users_logs
  event(new Registered($request));

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

 public function change_password()
 {
  return view('change_password');
 }

 public function proses_change_password(Request $request)
 {
  if (!Hash::check($request->OldPass, Auth::user()->password)) {
   return back()->with('error', 'Old password wrong , please try again');
  }

  if ($request->NewPass != $request->ConfirmPass) {
   return back()->with('error', 'Password not match , please try again');
  }

  $request->user()->update([
   'password' => Hash::make($request->ConfirmPass)
  ]);
  return redirect('dashboard-admin');
 }
}
