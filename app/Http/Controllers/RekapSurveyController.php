<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Survey;
use App\Models\SurveyPerkembangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class RekapSurveyController extends Controller
{
    public function index()
    {
        $geojson_format = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        $data = SurveyPerkembangan::with('image')->get();

        foreach ($data as $d) {
            $coor = explode(",", $d->kordinat);
            $value_data = [
                'type' => "Feature",
                'properties' => [
                    'id' => $d->id,
                    'name' => $d->name,
                    'kordinat' => $d->kordinat,
                    'id_sub_blok' => $d->id_sub_blok,
                    'kelurahan' => $d->kelurahan,
                    'kecamatan' => $d->kecamatan,
                    'nameimage' => count($d->image) == 0 ? 'not_image.png' : $d->image[0]->name,
                    'regional' => $d->regional,
                    'deskripsi_regional' => $d->deskripsi_regional,
                    'perkembangan_ling' => $d->neighborhood,
                    'deskripsi_neighborhood' => $d->deskripsi_neighborhood,
                    'perkembangan_ruang' => $d->transect_zone,
                    'deskripsi_transect_zone' => $d->deskripsi_transect_zone
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$coor[1], $coor[0]]
                ]
            ];

            // dd($value_data);

            array_push($geojson_format['features'], $value_data);
        }

        return json_encode($geojson_format, true);
    }
}

// class SurveyerController extends Controller
// {
//     public function index()
//     {
//         $geojson_format = [
//             'type' => 'FeatureCollection',
//             'features' => []
//         ];

//         if (Auth::user()->hasRole('admin')) {
//             $data = Survey::all();
//         } else {
//             $data = Survey::where('id_user', Auth::user()->id)->get();
//         }

//         foreach ($data as $d) {
//             $coor = explode(",", $d->kordinat);
//             $value_data = [
//                 'type' => "Feature",
//                 'properties' => [
//                     'id' => $d->id,
//                     'judul' => $d->judul,
//                     'kategori' => $d->kategori,
//                     'foto' => $d->foto,
//                     'catatan' => $d->catatan,
//                     'permasalahan' => $d->permasalahan,
//                     'solusi' => $d->solusi,
//                     'kordinat' => $d->kordinat,
//                     'kbli' => $d->kbli
//                 ],
//                 'geometry' => [
//                     'type' => 'Point',
//                     'coordinates' => [$coor[1], $coor[0]]
//                 ]
//             ];

//             array_push($geojson_format['features'], $value_data);
//         }

//         return json_encode($geojson_format, true);
//     }
// }
