<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendataanUsaha;

class PendataanUsahaController extends Controller
{
    public function savePendataanUsaha(Request $request)
    {
        $data = $request->all();
        if ($data['id'] == '') {
            PendataanUsaha::create($request->all());
        } else {
            $pendataanUsaha = PendataanUsaha::find($data['id']);
            $pendataanUsaha->update($request->all());
        }
    }

    public function getPendataanUsaha()
    {
        $pendataanUsaha = PendataanUsaha::all();
        return response()->json($pendataanUsaha);
    }

    public function getPendataanUsahaById($id)
    {
        $pendataanUsaha = PendataanUsaha::find($id);
        return response()->json($pendataanUsaha);
    }

    public function deletePendataanUsaha(Request $request)
    {
        $pendataanUsaha = PendataanUsaha::find($request->id);
        $pendataanUsaha->delete();
    }
}
