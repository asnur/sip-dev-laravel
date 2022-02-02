<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyerController extends Controller
{
    public function index()
    {
        $geojson_format = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        if (Auth::user()->hasRole('admin')) {
            $data = Survey::all();
        } else {
            $data = Survey::where('id_user', Auth::user()->id)->get();
        }

        foreach ($data as $d) {
            $coor = explode(",", $d->kordinat);
            $value_data = [
                'type' => "Feature",
                'properties' => [
                    'id' => $d->id,
                    'judul' => $d->judul,
                    'kategori' => $d->kategori,
                    'foto' => $d->foto,
                    'catatan' => $d->catatan,
                    'permasalahan' => $d->permasalahan,
                    'solusi' => $d->solusi,
                    'kordinat' => $d->kordinat,
                    'kbli' => $d->kbli
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$coor[1], $coor[0]]
                ]
            ];

            array_push($geojson_format['features'], $value_data);
        }

        return json_encode($geojson_format, true);
    }
}
