<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KuesionerController extends Controller
{
    public function getKuesioner($id)
    {
        $data = Http::get(env('APP_URL') . ":4000/quiz/$id")->json();

        return view('mobile-kuesioner', compact('data'));
    }

    public function saveFoto(Request $request)
    {
        $file = $request->file('foto');
        if ($request->hasFile('foto')) {
            foreach ($file as $f) {
                $f->move(public_path() . '/kuesioner/', $f->getClientOriginalName());
            }
        }
        return response()->json(['success' => 'File Uploaded Successfully']);
    }

    public function deleteKuesioner(Request $request)
    {
        $id = $request->id;
        $data = Http::delete(env('APP_URL') . ":4000/quiz/$id")->json();

        return redirect('/admin/kuesioner');
    }
}
