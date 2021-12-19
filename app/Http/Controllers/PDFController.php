<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function setKelurahan($kelurahan, Request $request)
    {
        $request->session()->put('kelurahan', $kelurahan);

        return $request->session()->get('kelurahan');
    }

    public function savePDF(Request $request)
    {
        $data = $request->input('uristring');
        $name_file = $request->input('name_file');
        $bin = base64_decode($data, true);

        file_put_contents("pdf_file/" . $name_file . ".pdf", $bin);
    }
}
