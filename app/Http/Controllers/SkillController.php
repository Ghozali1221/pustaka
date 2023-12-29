<?php

namespace App\Http\Controllers;

use App\Jobs\DataSkill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $mulai = microtime(true);

        // memanggil class DataSkill() yang ada di folder jobs
        $dataSkill = new DataSkill();
        $this->dispatch($dataSkill);

        $akhir = microtime(true);
        $waktuTotal = $akhir - $mulai;
        return "<h3> Berhasil dalam waktu : " . sprintf('%0.2f', $waktuTotal) . "detik </h3>";
    }
}
