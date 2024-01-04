<?php

namespace App\Http\Controllers;

use App\Models\HistoryLogs;

class HistoryController extends Controller
{
    public function index()
    {
        $dataHistory = HistoryLogs::with(['user', 'book'])->paginate(5);
        return view('history', ['dataHistory' => $dataHistory]);
    }
}
