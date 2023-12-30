<?php

namespace App\Http\Controllers;

use App\Mail\TestingEmail;
use Illuminate\Support\Facades\Mail;

class LatihanMailController extends Controller
{
    public function index()
    {
        Mail::to('mhdghozali2@gmail.com')->send(new TestingEmail());
    }
}
