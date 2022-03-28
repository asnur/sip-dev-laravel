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
                $q->where('name', 'surveyer');
            }
        )->get();

        $survey = Survey::all();

        $get_id = Survey::join('users', 'users.id', '=', 'survey.id_user')
            ->select('users.*', 'survey.*')
            ->orderBy('survey.id', 'Desc')
            // ->take(10)
            ->get();


        // $get_id = DB::table('users.*', 'survey.*')->join('users', 'users.id', '=', 'survey.id_user');

        return view('admin.home', compact(['pegawai_ajib', 'survey', 'get_id']));
    }

    public function fetchSurveyer()
    {
        $surveyers = Survey::join('users', 'users.id', '=', 'survey.id_user')
            ->select('users.*', 'survey.*')
            ->orderBy('survey.id', 'Desc')
            ->take(1)
            ->get();

        return response()->json([
            'surveyer' => $surveyers,
        ]);
    }

    public function dataTerbaru($id_data_terbaru)
    {
        $get_terbaru = Survey::join('users', 'users.id', '=', 'survey.id_user')
            ->select('users.*', 'survey.*')
            ->orderBy('survey.id', 'Desc')
            ->where('survey.id', $id_data_terbaru)
            ->take(1)
            ->get();

        return response()->json([
            'terbaru' => $get_terbaru,
        ]);
    }

    // belum update
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

        $kecamatan = [
            'UP PMPTSP Kecamatan Kramat Jati',
            'UP PMPTSP Kecamatan Gambir',
            'UP PMPTSP Kecamatan Cipayung',
            'UP PMPTSP Kecamatan Grogol Petamburan',
            'UP PMPTSP Kecamatan Kebayoran Baru',
            'UP PMPTSP Kecamatan Mampang Prapatan',
            'UP PMPTSP Kecamatan Kelapa Gading',
            'UP PMPTSP Kecamatan Sawah Besar',
            'UP PMPTSP Kecamatan Kalideres',
            'UP PMPTSP Kecamatan Senen',
            'UP PMPTSP Kecamatan Pesanggrahan',
            'UP PMPTSP Kecamatan Kebon Jeruk',
            'UP PMPTSP Kecamatan Tebet',
            'UP PMPTSP Kecamatan Taman sari',
            'UP PMPTSP Kecamatan Koja',
            'UP PMPTSP Kecamatan Cilandak',
            'UP PMPTSP Kecamatan Tanah Abang',
            'UP PMPTSP Kecamatan Pancoran',
            'UP PMPTSP Kecamatan Makasar',
            'UP PMPTSP Kecamatan Menteng',
            'UP PMPTSP Kecamatan Jagakarsa',
            'UP PMPTSP Kecamatan Kebayoran Lama',
            'UP PMPTSP Kecamatan Kemayoran',
            'UP PMPTSP Kecamatan Tanjung Priok',
            'UP PMPTSP Kecamatan Jatinegara',
            'UP PMPTSP Kecamatan Cakung',
            'UP PMPTSP Kecamatan Cengkareng',
            'UP PMPTSP Kecamatan Tambora',
            'UP PMPTSP Kecamatan Ciracas',
            'UP PMPTSP Kecamatan Matraman',
            'UP PMPTSP Kecamatan Palmerah',
            'UP PMPTSP Kecamatan Kembangan',
            'UP PMPTSP Kecamatan Cempaka Putih',
            'UP PMPTSP Kecamatan Duren Sawit',
            'UP PMPTSP Kecamatan Pasar Minggu',
            'UP PMPTSP Kecamatan Pademangan',
            'UP PMPTSP Kecamatan Setiabudi',
            'UP PMPTSP Kecamatan Pulo Gadung',
            'UP PMPTSP Kecamatan Johar Baru',
            'UP PMPTSP Kecamatan Cilincing'
        ];

        // $pegawai_ajib = User::whereHas(
        //     'roles',
        //     function ($q) {
        //         $q->where('name', 'surveyer');
        //     }
        // )
        //     ->limit(20)
        //     ->get();
        $pegawai_ajib = User::all()->take(20);

        // $pegawai_ajib = User::paginate(10);

        // dd($pegawai_ajib);

        $role = Role::all();

        // $user = User::all();

        return view('admin.pegawai', compact(['pegawai_ajib', 'role', 'kecamatan']));
    }

    public function add_pegawai_ajib(Request $request)
    {

        // dd($request->all());

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
                $q->where('name', 'surveyer');
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
