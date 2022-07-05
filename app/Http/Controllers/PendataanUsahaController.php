<?php

namespace App\Http\Controllers;

use App\Models\ImagePendataanUsaha;
use Illuminate\Http\Request;
use App\Models\PendataanUsaha;
use Illuminate\Support\Facades\Auth;

class PendataanUsahaController extends Controller
{
    public function savePendataanUsaha(Request $request)
    {
        $data = $request->all();
        if ($data['id'] == '') {
            PendataanUsaha::create($request->all());
            if ($request->hasFile('foto')) {
                $last_id = PendataanUsaha::orderBy('id', 'desc')->first();
                $file = $request->file('foto');
                foreach ($file as $f) {
                    $name = $name = rand(0, 9999999999) . strtotime(date('Y-m-d H:i:s')) . ".jpg";
                    $f->move(public_path() . '/usaha/', $name);
                    $data['foto'] = $name;
                    $data['id_survey'] = $last_id->id;
                    $data['name'] = $name;
                    ImagePendataanUsaha::create($data);
                }
            }
        } else {
            $pendataanUsaha = PendataanUsaha::find($data['id']);
            $pendataanUsaha->update($request->all());
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                foreach ($file as $f) {
                    $name = $name = rand(0, 9999999999) . strtotime(date('Y-m-d H:i:s')) . ".jpg";
                    $f->move(public_path() . '/usaha/', $name);
                    $data['foto'] = $name;
                    $data['id_survey'] = $data['id'];
                    $data['name'] = $name;
                    ImagePendataanUsaha::create($data);
                }
            }
        }
    }

    public function getPendataanUsaha()
    {
        $pendataanUsaha = PendataanUsaha::with('image')->where('id_user', Auth::user()->id)->get();
        return response()->json($pendataanUsaha);
    }

    public function getPendataanUsahaById($id)
    {
        $pendataanUsaha = PendataanUsaha::with('image')->find($id);
        return response()->json($pendataanUsaha);
    }

    public function deletePendataanUsaha(Request $request)
    {
        $pendataanUsaha = PendataanUsaha::with('image')->find((int)$request->id);
        if (count($pendataanUsaha->image) != 0) {
            foreach ($pendataanUsaha->image as $img) {
                unlink(public_path() . '/usaha/' . $img->name);
                $data_image = ImagePendataanUsaha::find($img->id);
                $data_image->delete();
            }
        }
        $pendataanUsaha->delete();
    }

    public function printUsahaExcel()
    {
        $data = PendataanUsaha::where('id_user', Auth::user()->id)->get();
        return view('print-usaha', compact('data'));
    }
}
