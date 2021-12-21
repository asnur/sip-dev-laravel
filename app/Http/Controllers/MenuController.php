<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function lokasi(Request $request)
    {
        $data_kordinat = $request->session()->get('kordinat');
        $data_lokasi = $request->session()->get('lokasi');
        $data_zonasi = $request->session()->get('zona');

        // var_dump($data_zonasi);
        // die();
        return view('menu.lokasi', ["title" => "Info Lokasi", "data_zonasi" => $data_zonasi, "data_lokasi" => $data_lokasi, "data_kordinat" => $data_kordinat]);
    }

    public function ekonomi(Request $request)
    {
        $data_lokasi = $request->session()->get('lokasi');
        return view('menu.ekonomi', ["title" => "Ekonomi", "data_lokasi" => $data_lokasi]);
    }

    public function kode_kbli(Request $request)
    {
        $data_subzona = $request->session()->get('kode_kbli');

        return view('menu.kode-kbli', ["title" => "Kode KBLI", "data_subzona" => $data_subzona]);
    }

    public function persil(Request $request)
    {
        $data_kordinat = $request->session()->get('kordinat');
        $data_zonasi = $request->session()->get('zona');
        return view('menu.persil', ["title" => "Persil", "data_kordinat" => $data_kordinat, "data_zonasi" => $data_zonasi]);
    }

    public function poi(Request $request)
    {
        // masih yg lain
        $data_kordinat = $request->session()->get('kordinat');

        return view('menu.poi', ["title" => "POI", "data_kordinat" => $data_kordinat]);
    }

    public function zonasi(Request $request)
    {
        $data_zonasi = $request->session()->get('zona');
        return view('menu.zonasi', ["title" => "Zonasi", "data_zonasi" => $data_zonasi]);
    }
}
