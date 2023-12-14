<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
 public function index()
 {
  $buku = Book::all();
  return view('buku', ['buku' => $buku]);
 }

 public function add_buku()
 {
  $dataKtgr = Category::all();
  return view('add-buku', ['dataKtgr' => $dataKtgr]);
 }

 public function proses_add_buku(Request $request)
 {
  $validatedData = $request->validate([
   'kode_buku' => 'unique:books', 'min:6', 'max:11',
   'judul' => 'min:6', 'max:100',
   'image' => 'mimes:jpg,jpeg|max:2048'
  ]);

  $newGbr = 'book.jpg';

  if ($request->file('image')) {
   $eksGbr = $request->file('image')->getClientOriginalExtension();
   $newGbr = $request->judul . '-' . now()->timestamp . '.' . $eksGbr;
   $request->file('image')->storeAs('upload', $newGbr);
  }

  $request['cover'] = $newGbr;
  $dataProses = Book::create($request->all());
  $dataProses->categories()->sync($request->categories);
  return redirect('/buku')->with('status', 'Berhasil tambah data judul: ' . $dataProses->judul);
 }

 public function edit_buku($slug)
 {
  $dataBuku = Book::where('slug', $slug)->first();
  $dataKtgr = Category::all();
  return view('edit-buku', ['dataBuku' => $dataBuku, 'dataKtgr' => $dataKtgr]);
 }

 public function buku_update(Request $request, $slug)
 {
  if ($request->file('image')) {
   $eksGbr = $request->file('image')->getClientOriginalExtension();
   $newGbr = $request->judul . '-' . now()->timestamp . '.' . $eksGbr;
   $request->file('image')->storeAs('upload', $newGbr);
   $request['cover'] = $newGbr;
  }

  $dataBuku = Book::where('slug', $slug)->first();
  $dataBuku->update($request->all());

  // logic kategori
  if ($request->categories) {
   $dataBuku->categories()->sync($request->categories);
  }

  return redirect('/buku')->with('status', 'Berhasil update data judul: ' . $dataBuku->judul);
 }

 public function delete_buku($slug)
 {
  $dataDelete = Book::where('slug', $slug)->first();
  return view('buku-del', ['dataDelete' => $dataDelete]);
 }

 public function destroy_buku($slug)
 {
  $dataDelete = Book::where('slug', $slug)->first();
  $dataDelete->delete();

  return redirect('/buku')->with('status', 'Berhasil hapus data : ' . $dataDelete->judul);
 }

 public function buku_restore()
 {
  $dataRecycle = Book::onlyTrashed()->get();
  return view('buku-restore', ['data' => $dataRecycle]);
 }

 public function restore_buku($slug)
 {
  $dataRestore = Book::withTrashed()->where('slug', $slug)->first();
  $dataRestore->restore();
  return redirect('/buku')->with('status', 'Berhasil restore data judul : ' . $dataRestore->judul);
 }

 public function fix_deleted_buku($slug)
 {
  $dataFix = Book::withTrashed()->where('slug', $slug)->first();
  File::delete(public_path('storage/upload') . '/' . $dataFix->cover);
  $dataFix->forceDelete();
  return redirect('/buku')->with('status', 'Berhasil deleted permanent data : ' . $dataFix->judul);
 }
}
