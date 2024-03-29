<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\HistoryLogs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PeminjamanController extends Controller
{
 public function index()
 {
  $user = User::where('id', '!=', 1)->where('status', '!=', 'non-aktif')->get();
  $buku = Book::all();
  return view('peminjaman-buku', ['user' => $user, 'buku' => $buku]);
 }

 // peminjaman
 public function store(Request $request)
 {
  $request['rent_date'] = Carbon::now()->toDateString();
  $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
  $buku = Book::findOrFail($request->book_id)->only('status');
  if ($buku['status'] != 'tersedia') {
   Session::flash('pesan', 'Buku Sedang Dipinjam');
   Session::flash('status', 'alert-danger');
   return redirect('peminjaman-buku');
  } else {
   $jlhPinjamBuku = HistoryLogs::where('user_id', $request->user_id)->where('fix_return_date', null)->count();
   if ($jlhPinjamBuku >= 3) {
    Session::flash('pesan', 'Peminjaman di tolak, Batas maksimum 3 buku telah terpenuhi.');
    Session::flash('status', 'alert-warning');
    return redirect('peminjaman-buku');
   } else {

    // jika berhasil
    try {
     DB::beginTransaction();
     // insert data to table history_logs melalui model HistoryLogs
     HistoryLogs::create($request->all());
     // book_id di ambil dari objek model HistoryLogs
     $buku = Book::findOrFail($request->book_id);
     $buku->status = 'dipinjam';
     $buku->save();
     DB::commit();
     Session::flash('pesan', 'Buku Berhasil Dipinjam');
     Session::flash('status', 'alert-success');
     return redirect('peminjaman-buku');
    } catch (\Throwable $th) {
     // jika gagal
     DB::rollBack();
    }
   }
  }
 }

 public function pengembalian_buku()
 {
  $dataUser = User::where('id', '!=', 1)->where('status', '!=', 'non-aktif')->get();
  $dataBuku = Book::all();
  return view('pengembalian-buku', ['dataUser' => $dataUser, 'dataBuku' => $dataBuku]);
 }

 public function proses_pengembalian_buku(Request $request)
 {
  //  $request->user_id dan $request->book_id di ambil dari name pada form pengembalian_buku, string user_id , book_id dan fix_return_id di ambil dari kolom pada tabel HistoryLogs
  $dataBuku = HistoryLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('fix_return_date', null);
  $dataAda =  $dataBuku->first();
  $jlhData = $dataBuku->count();

  if ($jlhData == 1) {
   $buku = Book::findOrFail($request->book_id);
   $buku->status = 'tersedia';
   $buku->save();

   $dataAda->fix_return_date = Carbon::now()->toDateString();
   $dataAda->save();
   notify()->success('Success');
   return redirect('pengembalian-buku');
  } else {
   Session::flash('pesan', 'Data Tidak Sesuai');
   Session::flash('status', 'alert-danger');
   return redirect('pengembalian-buku');
  }
 }
}
