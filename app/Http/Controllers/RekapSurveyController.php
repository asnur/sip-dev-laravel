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
                    // 'name' => $d->name,
                    // 'kordinat' => $d->kordinat,
                    // 'id_sub_blok' => $d->id_sub_blok,
                    // 'kelurahan' => $d->kelurahan,
                    // 'kecamatan' => $d->kecamatan,
                    // 'nameimage' => $d->image,
                    // // 'nameimage' => count($d->image) == 0 ? 'not_image.png' : $d->image[0]->name,
                    // 'regional' => $d->regional,
                    // 'deskripsi_regional' => $d->deskripsi_regional,
                    // 'perkembangan_ling' => $d->neighborhood,
                    // 'deskripsi_neighborhood' => $d->deskripsi_neighborhood,
                    // 'perkembangan_ruang' => $d->transect_zone,
                    // 'deskripsi_transect_zone' => $d->deskripsi_transect_zone
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


    function petaSurvey($id)
    {
        // dd($lat, $long);
        // $data = SurveyPerkembangan::select("*")
        //     ->where('kordinat', $long, ',', $lat)
        //     ->get();

        // dd($lat, $long);

        // $lat = '106.76188064062256';
        // $long = '-6.1536105686630265';

        $data = SurveyPerkembangan::with('image')
            // ->where('kordinat', '6.137311919718499,106.74380779266357')
            ->where('id', $id)
            ->get();

        foreach ($data as $d) {
            $value_data = [
                'id' => $d->id,
                'name' => $d->name,
                'kordinat' => $d->kordinat,
                'id_sub_blok' => $d->id_sub_blok,
                'kelurahan' => $d->kelurahan,
                'kecamatan' => $d->kecamatan,
                'nameimage' => $d->image,
                // 'nameimage' => count($d->image) == 0 ? 'not_image.png' : $d->image[0]->name,
                'regional' => $d->regional,
                'deskripsi_regional' => $d->deskripsi_regional,
                'perkembangan_ling' => $d->neighborhood,
                'deskripsi_neighborhood' => $d->deskripsi_neighborhood,
                'perkembangan_ruang' => $d->transect_zone,
                'deskripsi_transect_zone' => $d->deskripsi_transect_zone
            ];

            return response()->json([
                'data' => $value_data,
            ]);
        }

        // $data = SurveyPerkembangan::where('kordinat', '-6.333565835520005,106.90783395026773')->get();
        // $data = DB::table('survey_perkembangan_wilayah')->where('name', 'Jalan Tutul')->first();

        // dd($data);


    }
}
