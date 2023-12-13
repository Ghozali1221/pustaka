<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $buku = Book::where('status', '!=', 'tidak tersedia')->get();
        return view('public-page', ['buku' => $buku]);
    }
}
