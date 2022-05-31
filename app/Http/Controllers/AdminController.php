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
use DataTables;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function index()
    {
        // $data_survey = DB::select('SELECT * FROM users LEFT JOIN model_has_roles ON users.id = model_has_roles.model_id WHERE model_has_roles.role_id IS NULL');

        // foreach ($data_survey as $ds) {
        //     $user = User::find($ds->id);
        //     $user->assignRole('admin');
        // }

        // dd($data_survey);

        // foreach ($data_survey as $ds) {
        //     $kordinat = explode(',', $ds->kordinat);
        //     echo $kordinat[0];
        //     echo $kordinat[1];
        //     $response = Http::withHeaders([
        //         'Authorization' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2Nzg5NTQxMjIsIm5hbWUiOiJhZG1pbiJ9.WwGrJI-Cp_CJivzPuq3YrTOrygJrxO7r1jdx891xY5U'
        //     ])->asForm()->put('https://jakpintas.dpmptsp-dki.com:3443/wilayah', [
        //         'lat' => $kordinat[0],
        //         'lng' => $kordinat[1]
        //     ])->json();
        //     $kelurahan = $response['features'][0]['properties']['Kelurahan'];
        //     $data_update = Survey::find($ds->id);
        //     $data_update->kelurahan = $kelurahan;
        //     $data_update->save();
        // }

        // die();

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

    public function pegawai_ajib(Request $request)
    {
        // $data =
        //     User::select(['id', 'name', 'email', 'penempatan'])->whereHas(
        //         'roles',
        //         function ($q) {
        //             $q->where('name', '');
        //         }
        //     )->with('roles')->get();
        // dd($data);



        // $data =
        // User::select(['id', 'name', 'email', 'penempatan'])->with('roles')->find(2092);
        // dd($data->roles[0]->name);

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
        // $pegawai_ajib = User::all()->take(20);
        $role = Role::all();

        // $pegawai = User::latest()->get();

        if ($request->ajax()) {

            $data =
                User::select(['id', 'name', 'email', 'penempatan'])->with('roles');
            return Datatables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('aksi', function (User $row) {


                    // $btn = '<div class="row row-cards">
                    //     <div class="col-md-6 col-xl-6">
                    //     <a class="btn btn-tabler w-100 btn-icon" aria-label="Google" data-toggle="modal" data-target="#modalEditUsers" onclick=editPegawai(\'' . $row->id . '\'.\'' . $row->name . '\')><i class="fa fa-edit"></i></a>
                    //     </div>';

                    $btn = '<div class="row row-cards">
                        <div class="col-md-6 col-xl-6">
                        <a class="btn btn-tabler w-100 btn-icon" aria-label="Google" data-bs-toggle="modal" data-bs-target="#modalEditUsers"
                        onclick="editPegawai(' . $row->id . ' ,\' ' . $row->name . ' \',\'' . $row->email . '\',\' ' . $row->penempatan . ' \')"><i class="fa fa-edit"></i></a>
                        </div>';
                    $csrf = csrf_field();

                    $deletee = '<input type="hidden" name="_method" value="DELETE">';
                    // $route = route('delete-pegawai');

                    // $btn .= '<form action="/admin/pegawaiAjib" class="d-inline" method="POST">
                    // ' . $csrf . $deletee . '
                    // <input type="hidden" name="id" value="' . $row->id . '"><button type="submit" class="btn w-100 btn-sm btn-danger"><i class="fa fa-trash"></form>';

                    $btn .= '<div class="col-md-6 col-xl-6">
                        <form action="/admin/pegawaiAjib" class="d-inline" method="POST">
                        ' . $csrf . $deletee . '
                        <button type="submit" class="btn btn-google w-100 btn-icon" aria-label="Tabler">
                        <i class="fa fa-trash"></i>
                        </button>
                        <input type="hidden" name="id" value="' . $row->id . '">
                        </div>
                        </div>';


                    return $btn;

                    // return (string) view('admin.role_pegawai', compact(['row']));
                })
                ->addColumn('roles', function (User $user) {
                    return $user->roles[0]->name;
                    // $role =
                    //     Role::all();

                    // $user = User::all();


                    // foreach ($user->getRoleNames as $role) {
                    //     if ($role->name == "user") {
                    //         return 'User';
                    //     } elseif ($role->name == "surveyer") {
                    //         return 'Surveyer';
                    //     }
                    // }



                    // return (string) view('admin.role_pegawai', compact(['role', 'user']));
                })
                ->rawColumns(['aksi', 'roles'])
                ->make(true);
        }


        // $pegawai_ajib = User::whereHas(
        //     'roles',
        //     function ($q) {
        //         $q->where('name', 'surveyer');
        //     }
        // )
        //     ->limit(20)
        //     ->get();

        // $pegawai_ajib = User::paginate(10);

        // dd($pegawai_ajib);


        // $user = User::all();

        return view('admin.pegawai', compact(['role', 'kecamatan']));
    }


    public function add_pegawai_ajib(Request $request)
    {

        // dd($request);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'penempatan' => $request->input('penempatan')
        ]);

        $user->assignRole('surveyer');

        return redirect()->route('pegawai');
    }


    function show_pegawai_ajib($id)
    {
        $datapegawai = User::findOrFail($id);
        return view('admin.aksi_pegawai')->with(['data' => $datapegawai]);
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
        // $kelurahan = Survey::select('kelurahan')->groupBy('kelurahan')->get();
        $kelurahan = Survey::orderBy('kelurahan', 'DESC')->get()->whereNotNull('kelurahan')->groupBy('kelurahan');


        // dd($kelurahan);

        $pegawai_ajib = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'surveyer');
            }
        )
            // ->limit(20)
            ->get();

        return view('admin.kinerja', compact(['pegawai_ajib', 'kelurahan']));
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

        // if ($request->ajax()) {

        //     $data =
        //         Survey::select(['name', 'email', 'penempatan']);
        //     return Datatables::of($data)->make(true);
        // }
    }



    public function kinerja_data(Request $request)
    {
        if ($request->ajax()) {

            $data = Survey::select(['judul', 'foto', 'kategori', 'catatan', 'permasalahan', 'solusi', 'kelurahan']);
            return Datatables::of($data)
                ->editColumn('foto', function ($data) {
                    return '<img src="https://jakpintas.dpmptsp-dki.com/mobile/img/' . $data->foto . '" width="100%" height="110px" />';
                })
                ->rawColumns(['foto'])
                ->make(true);
        }
    }


    public function pdf_kinerja($kelurahan = null)
    {
        if ($kelurahan !== null) {
            $data = Survey::select(['judul', 'foto', 'kategori', 'catatan', 'permasalahan', 'solusi', 'kelurahan'])
                ->where('kelurahan', $kelurahan)
                ->get();

            // $get_kel = Survey::select(['kelurahan'])
            //     ->where('kelurahan', $kelurahan)
            //     ->get();

            // $upper_kel =  count($get_kel) >= 1 ?  $get_kel[0]->kelurahan : '';

            // $kell = Str::ucfirst($upper_kel);


        } else {
            $data = Survey::select(['judul', 'foto', 'kategori', 'catatan', 'permasalahan', 'solusi', 'kelurahan'])->get();
        }

        // if ($kelurahan == "Semua") {
        //     $data = Survey::select(['judul', 'foto', 'kategori', 'kelurahan'])->get();
        // }



        $opciones_ssl = array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                'allow_self_signed' => TRUE,
            ),
        );


        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->setPaper('portrait');
        $pdf->getDomPDF()->setHttpContext(stream_context_create($opciones_ssl));
        $pdf->loadView('admin.pdf_kinerja_ajib', compact('data'));

        return $pdf->stream();
    }


    // public function kuesioner()
    // {
    //     return view('admin.kuesioner');
    // }

    public function tambah_kuesioner()
    {
        return view('admin.tambah_kuesioner');
    }

    public function kosong_kuesioner()
    {
        return view('admin.kosong_kuesioner');
    }

    public function list_kuesioner()
    {
        return view('admin.list_kuesioner');
    }

    public function isi_kuesioner()
    {
        return view('admin.isi_kuesioner');
    }
}
