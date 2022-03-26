<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagePDFController extends Controller
{
    public function Dokumen()
    {
        return view('dokumen.page-pdf');
    }
}
