<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DigitasiController extends Controller
{
    public function index(Request $request)
    {
        $luas = $request->luas;
        $kategori = $request->opsidigitasi;
        $response = Http::asForm()->withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2Nzg5NTQxMjIsIm5hbWUiOiJhZG1pbiJ9.WwGrJI-Cp_CJivzPuq3YrTOrygJrxO7r1jdx891xY5U')->post('https://jakpintas.dpmptsp-dki.com:3443/digitasi-data', ['kordinat' => $request->coordinates, 'opsi' => $kategori]);
        dd($response->json());
        return view('digitasi');
    }
}
