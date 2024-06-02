<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;

class PublicController extends Controller
{
 public function index()
 {
  $buku = Book::where('status', '!=', 'tidak tersedia')->get();
  return view('public-page', ['buku' => $buku]);
 }
}
