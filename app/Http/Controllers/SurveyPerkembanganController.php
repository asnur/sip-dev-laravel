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
        SurveyPerkembangan::create([
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
            'id_user' => $request->input('id_user')
        ]);

        $lastId = SurveyPerkembangan::orderBy('id', 'DESC')->first();

        if ($request->hasfile('foto_survey')) {
            foreach ($request->file('foto_survey') as $key => $file) {
                $name = rand(0, 9999999999) . strtotime(date('Y-m-d H:i:s')) . ".jpg";
                $img = Image::make($file->getRealPath());
                $path = 'survey/';
                $img->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path . '/' . $name);
                // $file->move(public_path() . '/survey/', $name);

                SurveyPerkembanganImage::create([
                    'name' => $name,
                    'id_survey' => $lastId->id
                ]);
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
        $html = view('print-survey', compact('data'))->render();
        $path = public_path() . '/print/';
        $pdf = Browsershot::html('<h1>Test</h1>');
        // dd(view('print-survey', compact('data'))->render());
        // $opciones_ssl = array(
        //     "ssl" => array(
        //         "verify_peer" => false,
        //         "verify_peer_name" => false,
        //         'allow_self_signed' => TRUE,
        //     ),
        // );
        // $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        // $pdf->setPaper('a4', 'landscape');
        // $pdf->getDomPDF()->setHttpContext(stream_context_create($opciones_ssl));
        // $pdf->loadView('print-survey', compact('data'));
        // return $pdf->stream();
        $pdf->setNodeBinary('PATH %~dp0;%PATH%;')->save('/home/test.pdf');
    }
}
