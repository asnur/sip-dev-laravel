<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usaha;

class UsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        Usaha::create([
            'koordinat' => $request->koordinat,
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'image' => $fileName,
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
