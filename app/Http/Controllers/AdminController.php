<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\HistoryLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function index()
  {
    $dataBuku = Book::count();
    $dataKtgr = Category::count();
    $dataUser = User::count();
    return view('dashboard-admin', ['buku' => $dataBuku, 'ktgr' => $dataKtgr, 'user' => $dataUser]);
  }

  public function show_data()
  {
    $dataUser = User::where('role_id', 2)->where('status', 'aktif')->get();
    return view('data-pengunjung', ['dataUser' => $dataUser]);
  }

  public function user_non_aktif()
  {
    $newData = User::where('status', 'non-aktif')->where('role_id', 2)->get();
    return view('user-non-aktif', ['newData' => $newData]);
  }

  public function detail_user($slug)
  {
    $dataDetail = User::where('slug', $slug)->first();
    $dataHistory = HistoryLogs::with(['user', 'book'])->where('user_id', $dataDetail->id)->get();
    return view('detail-user', ['dataDetail' => $dataDetail, 'dataHistory' => $dataHistory[0]]);
  }

  public function aktifkan_user($slug)
  {
    $dataAktif = User::where('slug', $slug)->first();
    $dataAktif->status = 'aktif';
    $dataAktif->save();
    return redirect('/data-pengunjung')->with('status', 'Status User ' . $dataAktif->name . ' Telah Aktif');
  }

  public function deleted_user($slug)
  {
    $dataDelete = User::where('slug', $slug)->first();
    $dataDelete->status = 'non-aktif';
    $dataDelete->save();
    $dataDelete->delete();

    return redirect('/data-pengunjung')->with('status', 'Berhasil hapus data : ' . $dataDelete->name);
  }

  public function restore_user()
  {
    $dataRecycle = User::onlyTrashed()->get();
    return view('show-deleted-user', ['dataRecycle' => $dataRecycle]);
  }

  public function restore_data_user($slug)
  {
    $dataRestore = User::withTrashed()->where('slug', $slug)->first();
    $dataRestore->restore();
    return redirect('/data-pengunjung')->with('status', 'Berhasil restore data user : ' . $dataRestore->name);
  }

   public function permanent_deleted($slug)
 {
  $dataFix = User::withTrashed()->where('slug', $slug)->first();
  $dataFix->forceDelete();
  return redirect('/data-pengunjung')->with('status', 'Berhasil deleted permanent data : ' . $dataFix->name);
 }
}
