<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $pegawai_ajib = User::withCount('survey')->whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'disable-surveyer');
            }
        )->get();

        $survey = Survey::all();

        return view('admin.home', compact(['pegawai_ajib', 'survey']));
    }

    public function role_management()
    {
        return view('admin.role');
    }

    public function user_management()
    {
        $user = User::all();
        $role = Role::all();

        return view('admin.user', compact(['user', 'role']));
    }

    public function add_user(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->assignRole($request->input('role'));

        return redirect()->route('user');
    }

    public function update_user(Request $request)
    {
        $user = User::find($request->input('id'));
        // dd($request->all());

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        $user->syncRoles($request->input('role'));

        return redirect()->route('user');
    }

    public function delete_user(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->delete();

        return redirect()->route('user');
    }

    public function pegawai_ajib()
    {
        $pegawai_ajib = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'disable-surveyer');
            }
        )->get();
        $role = Role::all();

        return view('admin.pegawai', compact(['pegawai_ajib', 'role']));
    }

    public function add_pegawai_ajib(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'penempatan' => $request->input('penempatan')
        ]);

        $user->assignRole('surveyer');

        return redirect()->route('pegawai');
    }

    public function update_pegawai_ajib(Request $request)
    {
        $user = User::find($request->input('id'));

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->penempatan = $request->input('penempatan');

        $user->save();

        return redirect()->route('pegawai');
    }

    public function delete_pegawai_ajib(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->delete();

        return redirect()->route('pegawai');
    }

    public function kinerja_pegawai_ajib()
    {
        $pegawai_ajib = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'disable-surveyer');
            }
        )->get();

        return view('admin.kinerja', compact(['pegawai_ajib']));
    }

    public function track_cord()
    {
        DB::select('SET SESSION group_concat_max_len = 1000000000');
        $data = DB::select('SELECT  id_user, CONCAT("[",GROUP_CONCAT("[", kordinat ,"]"),"]") as kordinat FROM tracking GROUP BY id_user');

        return $data;
    }

    public function kinerja(Request $request)
    {
        if ($request->id == 0) {
            $data = Survey::all();
            return $data;
        } else {
            $data = Survey::where('id_user', $request->id)->get();
            return $data;
        }
    }
}
