<?php

namespace App\Http\Controllers;

use App\Models\HistoryLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengunjungController extends Controller
{
 public function index()
 {
  $dataHistory = HistoryLogs::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
  return view('pengunjung', ['dataHistory' => $dataHistory]);
 }

 public function change_pass()
 {
  return view('./guest/change_password');
 }

 public function process_change_pass(Request $request)
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
