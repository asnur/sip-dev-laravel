<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    public function index($periode = 1)
    {
        // dd(Carbon::now(), Carbon::now()->subDays($periode));
        $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::create(Carbon::now()->subDays($periode), Carbon::now()));
        $data_tanggal = [];
        $data_jumlah = [];
        $data = [];
        foreach ($analyticsData as $a) {
            array_push($data_tanggal, substr($a['date'], 0, 10));
            array_push($data_jumlah, $a['visitors']);
        }
        array_push($data, $data_tanggal);
        array_push($data, $data_jumlah);

        return $data;
    }
}
