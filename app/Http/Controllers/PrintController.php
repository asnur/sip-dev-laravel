<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintController extends Controller
{
    public function print()
    {
        // dd(session('ketentuan_tpz'));
        $pdf = PDF::loadView('print');
        return $pdf->stream();
        // return view('print');
    }

    public function save_image(Request $request)
    {
        $image = $request->input('img');
        $request->session()->put('img', $image);
    }

    public function save_wilayah(Request $request)
    {
        $wilayah = $request->input('wilayah');
        $request->session()->put('wilayah', $wilayah);
    }

    public function save_kordinat(Request $request)
    {
        $kordinat = $request->input('kordinat');
        $request->session()->put('kordinat', $kordinat);
    }

    public function save_eksisting(Request $request)
    {
        $eksisting = $request->input('eksisting');
        $request->session()->put('eksisting', $eksisting);
    }

    public function save_njop(Request $request)
    {
        $njop = $request->input('njop');
        $request->session()->put('njop', $njop);
    }

    public function save_bpn(Request $request)
    {
        $bpn = $request->input('bpn');
        $request->session()->put('bpn', $bpn);
    }

    public function save_chart_pie(Request $request)
    {
        $chart_pie = $request->input('pie');
        $request->session()->put('chart_pie', $chart_pie);
    }

    public function save_chart_bar(Request $request)
    {
        $chart_bar = $request->input('bar');
        $request->session()->put('chart_bar', $chart_bar);
    }

    public function save_sanitasi(Request $request)
    {
        $sanitasi = $request->input('sanitasi');
        $request->session()->put('sanitasi', $sanitasi);
    }

    public function save_turun(Request $request)
    {
        $turun = $request->input('turun');
        $request->session()->put('turun', $turun);
    }

    public function save_air_tanah(Request $request)
    {
        $air_tanah = $request->input('air_tanah');
        $request->session()->put('air_tanah', $air_tanah);
    }

    public function save_zoning(Request $request)
    {
        $zoning = $request->input('zoning');
        $request->session()->put('zoning', $zoning);
    }

    public function save_ketentuan_tpz(Request $request)
    {
        $ketentuan_tpz = $request->input('ketentuan_tpz');
        $request->session()->put('ketentuan_tpz', $ketentuan_tpz);
    }

    public function save_poi(Request $request)
    {
        $poi = $request->input('poi');
        $request->session()->put('poi', $poi);
    }

    public function save_kbli(Request $request)
    {
        $kbli = $request->input('kbli');
        $request->session()->put('kbli', $kbli);
    }

    public function check_print(Request $request)
    {
        $kategori = $request->input('kategeori');
        $status = $request->input('status');

        return $request->session()->put($kategori, $status);
    }
}
