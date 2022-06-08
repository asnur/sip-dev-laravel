<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use App\Models\SurveyPerkembangan;
use App\Models\User;
use Carbon\Carbon;

class GrafikChartController extends Controller
{
    public function index($periode = 1)
    {

        $pegawai_ajib = User::withCount('perkembangan')->get();
        return $pegawai_ajib;
    }
}
