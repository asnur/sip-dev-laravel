<?php

namespace App\Http\Controllers;

use App\Imports\MainImport;
use App\Imports\SurveyImport;
use App\Models\Survey;
use App\Models\SurveyPerkembangan;
use App\Models\SurveyPerkembanganImage;
use App\Models\TestSurveyPerkembangan;
use App\Models\TestSurveyPerkembanganImage;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Image;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SurveyPerkembanganController extends Controller
{

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getDataSurvey($id_user, Request $request)
    {
        $data = SurveyPerkembangan::with('image')->where('id_user', $id_user)->orderBy('id_baru', 'DESC')->get();
        return $data;
    }

    public function saveDataSurvey(Request $request)
    {
        if (Auth::user()->hasRole('CPNS')) {
            return response()->json(['status' => 'failed', 'message' => 'Anda tidak memiliki akses']);
        }
        $uid = base64_encode($request->input('id_sublok') . $request->input('name') . $request->input('kelurahan') . $request->input('kecamatan') . $request->input('regional') . $request->input('neighborhood') . $request->input('transect_zone') . $request->input('id_user'));
        $id_fix = explode(",", $request->input('kordinat'));
        $saved = SurveyPerkembangan::create([
            'id' => substr($id_fix[0], -4) . substr($id_fix[1], -4),
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
            'global_id' => $request->input('global_id'),
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
                        'id_survey' => substr($id_fix[0], -4) . substr($id_fix[1], -4)
                    ]);
                }
            }
        }
    }
    public function saveEditDataSurvey(Request $request)
    {
        // dd($request->all());
        if (Auth::user()->hasRole('CPNS')) {
            return response()->json(['status' => 'failed', 'message' => 'Anda tidak memiliki akses']);
        }
        $data = SurveyPerkembangan::where('id_baru', (int)$request->input('id'))->first();
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
        $data->deskripsi_transect_zone = $request->input('deskripsi_transect_zone');
        $data->global_id = $request->input('global_id');

        $data->save();


        if ($request->hasfile('foto_survey')) {
            foreach ($request->file('foto_survey') as $key => $file) {
                $name = rand(0, 9999999999) . strtotime(date('Y-m-d H:i:s')) . ".jpg";
                $file->move(public_path() . '/survey/', $name);

                SurveyPerkembanganImage::create([
                    'name' => $name,
                    'id_survey' => $data->id
                ]);
            }
        }
    }

    public function editDataSurvey(Request $request)
    {
        $data = SurveyPerkembangan::with('image')->where('id_baru', (int)$request->input('id'))->first();

        return $data;
    }

    public function deleteDataSurvey(Request $request)
    {
        if (Auth::user()->hasRole('CPNS')) {
            return response()->json(['status' => 'failed', 'message' => 'Anda tidak memiliki akses']);
        }
        $data = SurveyPerkembangan::with('image')->where('id_baru', (int)$request->input('id'))->first();
        if (count($data->image) != 0) {
            foreach ($data->image as $img) {
                unlink(public_path() . '/survey/' . $img->name);
                $data_image = SurveyPerkembanganImage::find($img->id);
                $data_image->delete();
            }
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
        $data = SurveyPerkembangan::where('id_user', Auth::user()->id)->get();
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

    public function printSurveyExcel(Request $request)
    {
        $data = SurveyPerkembangan::where('id_user', Auth::user()->id)->get();

        return view('print-excel', compact('data'));
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
                    'id_baru' => $d->id_baru,
                    'id_user' => $d->id_user,
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

    public function layerSurveyPerkembanganPartner()
    {
        $geojson_format = [
            'type' => 'FeatureCollection',
            'features' => []
        ];

        $data = SurveyPerkembangan::with('image')->whereIn('id_user', [Auth::user()->partner_id, Auth::user()->partner_id_2])->get();

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
                    'id_baru' => $d->id_baru,
                    'id_user' => $d->id_user,
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

    public function importExcelSurvey(Request $request)
    {
        if (Auth::user()->hasRole('CPNS')) {
            return response()->json(['error' => 'Anda tidak memiliki akses']);
        }
        $loadExcel = Excel::toArray(new SurveyImport, $request->file('excel'));
        if ($loadExcel[0] == []) {
            return response()->json(['error' => 'Data Tidak Lengkap']);
        }
        try {
            Excel::import(new SurveyImport, $request->file('excel'));
            if ($request->hasFile('foto')) {
                foreach ($request->file('foto') as $key => $f) {
                    $id_survey = $f->getClientOriginalName();
                    $name = $this->generateRandomString() . rand(0, 9999999999) . strtotime(date('Y-m-d H:i:s')) . ".jpg";
                    $f->move(public_path() . '/survey', $name);
                    $id_survey_fix = explode('-', $id_survey)[0];
                    SurveyPerkembanganImage::create([
                        'id_survey' => $id_survey_fix,
                        'name' => $name
                    ]);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function exportImageSurvey($transect_zone)
    {
        $data = DB::connection('pgsql')->select("SELECT DISTINCT i.name FROM image_survey_perkembangan i JOIN survey_perkembangan_wilayah s ON s.id::bigint=i.id_survey WHERE s.transect_zone = '$transect_zone'");
        $list_image = [];
        foreach ($data as $d) {
            array_push($list_image, public_path() . '/survey/' . $d->name);
        }

        $zipper = new \Madnest\Madzipper\Madzipper;
        $zipper->make(public_path() . '/survey/' . $transect_zone . '.zip')->add($list_image)->close();
        return response()->download(public_path() . '/survey/' . $transect_zone . '.zip');
    }
}
