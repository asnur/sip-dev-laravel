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

        if (Auth::user()->hasRole('admin')) {

            // $data = SurveyPerkembangan::with(['image'])->get();


            // $data = SurveyPerkembangan::join('image_survey_perkembangan', 'image_survey_perkembangan.id', '=', 'survey_perkembangan_wilayah.id')
            //     ->select('survey_perkembangan_wilayah.*', 'survey.*')
            //     ->get();

            $data = DB::table('survey_perkembangan_wilayah')
                ->join(
                    'image_survey_perkembangan',
                    'image_survey_perkembangan.id',
                    '=',
                    'survey_perkembangan_wilayah.id'
                )
                ->select('survey_perkembangan_wilayah.*', 'survey_perkembangan_wilayah.name as namesurvey', 'image_survey_perkembangan.*', 'image_survey_perkembangan.name as nameimage')
                ->get();

            // dd($data);
        } else {
            $data = Survey::where('id_user', Auth::user()->id)->get();
        }

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
                    'namesurvey' => $d->namesurvey,
                    'nameimage' => $d->nameimage,
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
