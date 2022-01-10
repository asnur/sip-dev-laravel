<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

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

        $data = Survey::all();

        foreach ($data as $d) {
            $coor = explode(",",$d->kordinat);
            $value_data = [
                'type' => "Feature",
                'properties' => [
                    'judul' => $d->judul,
                    'kategori' => $d->kategori,
                    'foto' => $d->foto,
                    'catatan' => $d->catatan
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$coor[1],$coor[0]]
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

        $this->validate($request, [
            'koordinat' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:10240',
            'catatan' => 'required',
        ]);

        $getimage = $request->file('image');

        $fileName = "$request->judul" . "_" . time() . "_" . $getimage->getClientOriginalName();

        $path = 'img/';
        $getimage->move($path, $fileName);

        Survey::create([
            'kordinat' => $request->koordinat,
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'foto' => $fileName,
            'catatan' => $request->catatan
        ]);

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
    public function destroy($id)
    {
        //
    }
}
