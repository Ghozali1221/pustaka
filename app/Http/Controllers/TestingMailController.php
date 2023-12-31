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
        $pengunjung = User::all();
         Mail::to('ghozalipane@gmail.com')->send(new TestingMailTrap($pengunjung));
    }
}
