<?php

namespace App\Http\Controllers;

use App\Models\SurveyPerkembangan;
use App\Models\SurveyPerkembanganImage;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Image;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyPerkembanganController extends Controller
{
    public function getDataSurvey($id_user, Request $request)
    {
        $data = SurveyPerkembangan::with('image')->where('id_user', $id_user)->orderBy('id', 'DESC')->get();
        return $data;
    }

    public function saveDataSurvey(Request $request)
    {
        $uid = base64_encode($request->input('id_sublok') . $request->input('name') . $request->input('kelurahan') . $request->input('kecamatan') . $request->input('regional') . $request->input('neighborhood') . $request->input('transect_zone') . $request->input('id_user'));
        $saved = SurveyPerkembangan::create([
            'id_sub_blok' => $request->input('id_sublok'),
            'name' => $request->input('name'),
            'kordinat' => $request->input('kordinat'),
            'kelurahan' => $request->input('kelurahan'),
            'kecamatan' => $request->input('kecamatan'),
            'regional' => $request->input('regional'),
            'deskripsi_regional' => $request->input('deskripsi_regional'),
            'neighborhood' => $request->input('neighborhood'),
            'deskripsi_neighborhood' => $request->input('deskripsi_neighborhood'),
            'transect_zone' => $request->input('transect_zone'),
            'deskripsi_transect_zone' => $request->input('deskripsi_transect_zone'),
            'id_user' => $request->input('id_user'),
            'uid' => $uid,
        ]);

        if ($saved) {
            $lastId = SurveyPerkembangan::orderBy('id', 'DESC')->first();

            if ($request->hasfile('foto_survey')) {
                foreach ($request->file('foto_survey') as $key => $file) {
                    $name = rand(0, 9999999999) . strtotime(date('Y-m-d H:i:s')) . ".jpg";
                    $img = Image::make($file->getRealPath());
                    $path = 'survey/';
                    // $img->resize(400, 400, function ($constraint) {
                    //     $constraint->aspectRatio();
                    // })->save($path . '/' . $name);
                    $file->move(public_path() . '/survey/', $name);

                    SurveyPerkembanganImage::create([
                        'name' => $name,
                        'id_survey' => $lastId->id
                    ]);
                }
            }
        }
    }
    public function saveEditDataSurvey(Request $request)
    {
        // dd($request->all());
        $data = SurveyPerkembangan::find($request->input('id'));
        $data->id_sub_blok = $request->input('id_sublok');
        $data->name = $request->input('name');
        $data->kordinat = $request->input('kordinat');
        $data->kelurahan = $request->input('kelurahan');
        $data->kecamatan = $request->input('kecamatan');
        $data->regional = $request->input('regional');
        $data->deskripsi_regional = $request->input('deskripsi_regional');
        $data->neighborhood = $request->input('neighborhood');
        $data->deskripsi_neighborhood = $request->input('deskripsi_neighborhood');
        $data->transect_zone = $request->input('transect_zone');

        $data->save();


        if ($request->hasfile('foto_survey')) {
            foreach ($request->file('foto_survey') as $key => $file) {
                $name = rand(0, 9999999999) . strtotime(date('Y-m-d H:i:s')) . ".jpg";
                $file->move(public_path() . '/survey/', $name);

                SurveyPerkembanganImage::create([
                    'name' => $name,
                    'id_survey' => $request->input('id')
                ]);
            }
        }
    }

    public function editDataSurvey(Request $request)
    {
        $data = SurveyPerkembangan::with('image')->find($request->input('id'));

        return $data;
    }

    public function deleteDataSurvey(Request $request)
    {
        $data = SurveyPerkembangan::with('image')->find($request->input('id'));

        foreach ($data->image as $img) {
            unlink(public_path() . '/survey/' . $img->name);
            $data_image = SurveyPerkembanganImage::find($img->id);
            $data_image->delete();
        }

        $data->delete();
    }

    public function getAllDataSurvey()
    {
        $data = User::withCount('perkembangan')->get();

        return $data;
    }

    public function detailDataSurvey(Request $request)
    {
        $data = SurveyPerkembangan::with('image')->find($request->input('id'));
        return $data;
    }

    public function deleteImageSurvey(Request $request)
    {
        $data = SurveyPerkembanganImage::find($request->input('id'));
        unlink(public_path() . '/survey/' . $data->name);
        $data->delete();

        return response()->json(['success' => 'Berhasil menghapus foto']);
    }

    public function printSurvey(Request $request)
    {
        $data = SurveyPerkembangan::with('image')->where('id_user', Auth::user()->id)->get();
        $opciones_ssl = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                'allow_self_signed' => TRUE,
            ),
        );
        $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->setPaper('legal', 'landscape');
        $pdf->getDomPDF()->setHttpContext(stream_context_create($opciones_ssl));
        $pdf->loadView('print-survey', compact('data'));
        // return $pdf->stream();
        return $pdf->download('Arsip Survey ' . Auth::user()->name . '.pdf');
    }

    public function layerSurveyPerkembangan()
    {
        $geojson_format = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        $data = SurveyPerkembangan::with('image')->where('id_user', Auth::user()->id)->get();

        foreach ($data as $d) {
            $coor = explode(",", $d->kordinat);
            $value_data = [
                'type' => "Feature",
                'properties' => [
                    'name' => $d->name,
                    'id_sub_blok' => $d->id_sub_blok,
                    'image' => $d->image,
                    'kelurahan' => $d->kelurahan,
                    'kecamatan' => $d->kecamatan,
                    'regional' => $d->regional,
                    'deskripsi_regional' => $d->deskripsi_regional,
                    'neighborhood' => $d->neighborhood,
                    'deskripsi_neighborhood' => $d->deskripsi_neighborhood,
                    'transect_zone' => $d->transect_zone,
                    'deskripsi_transect_zone' => $d->deskripsi_transect_zone,
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [(float)$coor[1], (float)$coor[0]]
                ]
            ];

            array_push($geojson_format['features'], $value_data);
        }

        return response()->json($geojson_format);
    }

    public function surveyKelurahan(Request $request)
    {
        $geojson_format = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        $data = SurveyPerkembangan::with('image')->where('kelurahan', $request->kelurahan)->get();

        foreach ($data as $d) {
            $coor = explode(",", $d->kordinat);
            $value_data = [
                'type' => "Feature",
                'properties' => [
                    'name' => $d->name,
                    'id_sub_blok' => $d->id_sub_blok,
                    'image' => $d->image,
                    'kelurahan' => $d->kelurahan,
                    'kecamatan' => $d->kecamatan,
                    'regional' => $d->regional,
                    'deskripsi_regional' => $d->deskripsi_regional,
                    'neighborhood' => $d->neighborhood,
                    'deskripsi_neighborhood' => $d->deskripsi_neighborhood,
                    'transect_zone' => $d->transect_zone,
                    'deskripsi_transect_zone' => $d->deskripsi_transect_zone,
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [(float)$coor[1], (float)$coor[0]]
                ]
            ];

            array_push($geojson_format['features'], $value_data);
        }

        return response()->json($geojson_format);
    }
}
