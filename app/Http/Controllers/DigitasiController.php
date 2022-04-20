<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DigitasiController extends Controller
{
    public function index(Request $request)
    {
        $url = env('APP_URL');
        $luas = $request->luas;
        $kategori = $request->opsidigitasi;
        $response = Http::asForm()->withToken('eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2Nzg5NTQxMjIsIm5hbWUiOiJhZG1pbiJ9.WwGrJI-Cp_CJivzPuq3YrTOrygJrxO7r1jdx891xY5U')->post("$url:3443/digitasi-data", ['kordinat' => $request->coordinates, 'opsi' => $kategori]);
        $opciones_ssl = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                'allow_self_signed' => TRUE,
            ),
        );
        $data = $response->json();
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->setPaper('portrait');
        $pdf->getDomPDF()->setHttpContext(stream_context_create($opciones_ssl));
        $pdf->loadView('digitasi', compact(['data', 'luas', 'kategori']));

        return $pdf->stream();
    }
}
