<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create_admin(Request $request)
    {
        return view('admin.create', ["title" => " create"]);
    }
}
