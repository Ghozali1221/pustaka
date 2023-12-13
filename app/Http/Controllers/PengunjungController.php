<?php

namespace App\Http\Controllers;

use App\Models\HistoryLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengunjungController extends Controller
{
  public function index()
  {
    // cek user
    //  Auth::user()->id;
    $dataHistory = HistoryLogs::with(['user', 'book'])->where('user_id', Auth::user()->id)->get();
    return view('pengunjung', ['dataHistory' => $dataHistory]);
  }


}
