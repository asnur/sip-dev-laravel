<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('user')) {
            return $request->session()->get('user');
        } else {
            return 'Data tidak ditemukan pada session';
        }
    }
    public function store(Request $request)
    {
        $request->session()->put('user', 'John Doe');
        return "Data user sudah ditambah pada session";
    }
    public function delete(Request $request)
    {
        $request->session()->forget('user');
        return "Data sudah dihapus pada session.";
    }
    public function push(Request $request)
    {
        if ($request->session()->exists('user')) {
            $request->session()->push('user.teams', 'developers');
            return $request->session()->get('user');
        } else {
            return 'Data tidak ditemukan pada session';
        }
    }
}
