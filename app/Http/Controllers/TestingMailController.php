<?php

namespace App\Http\Controllers;

use App\Mail\TestingMailTrap;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestingMailController extends Controller
{
    public function index()
    {
        // dd('testing');
        $pengunjung = User::all();
         Mail::to('mhdghozali2@gmail.com')->send(new TestingMailTrap($pengunjung));
    }
}
