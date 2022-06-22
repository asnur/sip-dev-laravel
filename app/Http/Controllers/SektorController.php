<?php

namespace App\Http\Controllers;

use App\Models\SektorModel;
use Illuminate\Http\Request;

class SektorController extends Controller
{
    public function getData(Request $request)
    {
        $sektor = SektorModel::where('sektor', $request->sektor)->get();
        return response()->json($sektor);
    }
}
