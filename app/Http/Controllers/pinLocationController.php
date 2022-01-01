<?php

namespace App\Http\Controllers;

use App\Models\imageFavorite;
use Illuminate\Http\Request;
use App\Models\PinLocation;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Facades\File as FacadesFile;

class pinLocationController extends Controller
{
    public function getData($id_user, Request $request)
    {
        $data = PinLocation::where('user_id', $id_user)->with('image')->orderBy('id', 'DESC')->get();

        return $data;
    }

    public function saveData(Request $request)
    {
        PinLocation::create([
            'judul' => $request->input('judul'),
            'kordinat' => $request->input('kordinat'),
            'catatan' => $request->input('catatan'),
            'kelurahan' => $request->input('kelurahan'),
            'tipe' => $request->input('tipe'),
            'user_id' => $request->input('id_user')
        ]);

        $lastId = PinLocation::orderBy('id', 'DESC')->first();

        if ($request->hasfile('foto')) {
            foreach ($request->file('foto') as $key => $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/favorit/', $name);

                imageFavorite::create([
                    'name' => $name,
                    'id_lokasi' => $lastId->id
                ]);
            }
        }
    }

    public function getIdUser()
    {
        $id =  Auth::user()->id;
        return $id;
    }

    public function detailData(Request $request)
    {
        $data = PinLocation::with('image')->find($request->input('id'));

        return $data;
    }

    public function deleteData(Request $request)
    {
        $data = PinLocation::find($request->input('id_data'));

        $data->delete();
    }
}
