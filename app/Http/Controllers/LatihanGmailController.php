<?php

namespace App\Http\Controllers;

use App\Mail\LatihanGmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LatihanGmailController extends Controller
{
    public function index()
    {
        Mail::to('mhdghozali2@gmail.com')->send(new LatihanGmail());
        return 'BERHASIL TESTING';
    }
}
