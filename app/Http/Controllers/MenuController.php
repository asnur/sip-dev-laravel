<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function lokasi()
    {
        return view('menu.lokasi', ["title" => "Info Lokasi"]);
    }

    public function ekonomi()
    {
        return view('menu.ekonomi', ["title" => "Ekonomi"]);
    }

    public function kode_kbli()
    {
        return view('menu.kode-kbli', ["title" => "Kode KBLI"]);
    }

    public function persil()
    {
        return view('menu.persil', ["title" => "Persil"]);
    }

    public function poi()
    {
        return view('menu.poi', ["title" => "POI"]);
    }

    public function zonasi()
    {
        return view('menu.zonasi', ["title" => "Zonasi"]);
    }
}
