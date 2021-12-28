<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinLocation;
use Illuminate\Support\Facades\Auth;

class pinLocationController extends Controller
{
    public function getData($id_user, Request $request)
    {
        $data = PinLocation::where('user_id', $id_user)->orderBy('id', 'DESC')->get();

        return $data;
    }

    public function saveData(Request $request)
    {
        PinLocation::create([
            'judul' => $request->input('judul'),
            'kordinat' => $request->input('kordinat'),
            'catatan' => $request->input('catatan'),
            'kelurahan' => $request->input('kelurahan'),
            'user_id' => $request->input('id_user')
        ]);
    }

    public function getIdUser()
    {
        $id =  Auth::user()->id;
        return $id;
    }

    public function deleteData(Request $request)
    {
        $data = PinLocation::find($request->input('id_data'));

        $data->delete();
    }
}
