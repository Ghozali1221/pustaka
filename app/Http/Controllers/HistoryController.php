<?php

namespace App\Http\Controllers;

use App\Models\HistoryLogs;

class HistoryController extends Controller
{
    public function index()
    {
        $dataHistory = HistoryLogs::with(['user', 'book'])->get();
        return view('history', ['dataHistory' => $dataHistory]);
    }
}
