<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index(Request $request)
    {
        Tracking::create([
            'kordinat' => $request->input('lng') . ',' . $request->input('lat'),
            'id_user' => $request->input('id_user'),
            'tanggal' => date('Y-m-d')
        ]);

        return 'success send cordinates';
    }
}
