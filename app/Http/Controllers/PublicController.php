<?php

namespace App\Http\Controllers;

use App\Models\Book;

class PublicController extends Controller
{
    public function index()
    {
        $buku = Book::where('status', '!=', 'tidak tersedia')->get();
        return view('public-page', ['buku' => $buku]);
    }
}
