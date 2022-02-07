<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use Illuminate\Support\Facades\Auth;
use Image;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd($request->id);

        $id_user = auth()->user()->id;

        $validateFile = "";
        if ($request->id !== null) {
            $validateFile = 'file|image|mimes:jpeg,png,jpg';
        } else {
            $validateFile = 'required|file|image|mimes:jpeg,png,jpg';
        }

        $this->validate($request, [
            'koordinat' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'image' => $validateFile,
        ]);

        $getimage = $request->file('image');

        if ($request->hasFile('image')) {
            $fileName = "$request->judul" . "_" . time() . "_" . $getimage->getClientOriginalName();
            $img = Image::make($getimage->getRealPath());
            $path = 'img/';
            $img->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path . '/' . $fileName);
        }

        if ($request->id !== null) {
            $data = Survey::find($request->id);
            $data->kordinat = $request->koordinat;
            $data->judul = $request->judul;
            $data->kategori = $request->kategori;
            $data->catatan = $request->catatan;
            $data->permasalahan = $request->permasalahan;
            $data->solusi = $request->solusi;
            $data->kbli = $request->kbli;
            if ($request->hasFile('image')) {
                $data->foto = $fileName;
            }

            $data->save();
        } else {
            Survey::create([
                'kordinat' => $request->koordinat,
                'judul' => $request->judul,
                'kategori' => $request->kategori,
                'foto' => $fileName,
                'catatan' => $request->catatan,
                'permasalahan' => $request->permasalahan,
                'solusi' => $request->solusi,
                'kbli' => $request->kbli,
                'id_user' => $id_user
            ]);
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Survey::find($request->id)->delete();

        return redirect('/');
    }
}