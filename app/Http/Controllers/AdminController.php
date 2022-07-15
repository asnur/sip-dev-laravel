<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use App\Models\Survey;
use App\Models\User;
use App\Models\SurveyPerkembangan;
use App\Models\SurveyPerkembanganImage;
use App\Models\ProgresSurvey;
use App\Models\ViewDetil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use DataTables;
use Illuminate\Support\Facades\Http;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

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

    public function fetchPerkembangan()
    {

        // $perkembangan_surver = SurveyPerkembangan::join('users', 'users.id', '=', 'survey_perkembangan_wilayah.id_user')
        //     ->select('users.*', 'survey_perkembangan_wilayah.*')
        //     ->orderBy('survey_perkembangan_wilayah.id_user', 'Desc')
        //     ->get();

        $perkembangan_surver = SurveyPerkembangan::with(['user', 'image'])->orderBy('id_baru', 'DESC')->take(5)->get();

        // dd($perkembangan_surver);

        return response()->json([
            'perkembangan' => $perkembangan_surver,
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

    public function jawaban_kuesioner()
    {
        return view('admin.jawaban_kuesioner');
    }

    public function perkembangan_survey()
    {
        // kepake
        // $hasil_jumlah_titik = SurveyPerkembangan::all();
        // $hasil_jumlah_titik = DB::table('survey_perkembangan_wilayah')->get();

        // $hasil_jumlah_titik = DB::connection('pgsql')->table('survey_perkembangan_wilayah')->count();
        $hasil_jumlah_titik = SurveyPerkembangan::all()->count();

        // dd($hasil_jumlah_titik);

        $progres_total = $hasil_jumlah_titik / 82988 * 100;

        // dd($progres_total);

        $get_progres_total = number_format((float)$progres_total, 2, '.', '');

        $get_today = date('Y-m-d');

        // $get_perkembangan_day = DB::connection('pgsql')->table('survey_perkembangan_wilayah')->where('date', $get_today)->get();
        $get_perkembangan_day = SurveyPerkembangan::Where('date', $get_today)->get();


        // dd($get_perkembangan_day->count());



        // $pegawai_ajib2 = User::withCount('perkembangan')->get();


        $pegawai_ajib2 = User::with(['roles', 'kegiatan'])->whereHas('kegiatan', function ($q) {
            $q->whereHas('kegiatan', function ($q) {
                $q->where('nama', 'Survey Perkembangan Wilayah');
            });
        })->get();


        // $datas = SurveyPerkembangan::with('image')->get();

        $datas = SurveyPerkembangan::orderBy('id_baru', 'DESC')->take(100)->get();
        // $kelurahan = Survey::orderBy('kelurahan', 'DESC')->get()->whereNotNull('kelurahan')->groupBy('kelurahan');


        // dd(count($datas[0]->image) == 0);
        // dd($datas[2]->image);


        $get_id = Survey::join('users', 'users.id', '=', 'survey.id_user')
            ->select('users.*', 'survey.*')
            ->orderBy('survey.id', 'Desc')
            // ->take(20)
            ->get();

        // $datas2 = DB::table('survey_perkembangan_wilayah')
        // ->join(
        //     'image_survey_perkembangan',
        //     'image_survey_perkembangan.id',
        //     '=',
        //     'survey_perkembangan_wilayah.id'
        // )
        // ->join(
        //     'users',
        //     'users.id',
        //     '=',
        //     'survey_perkembangan_wilayah.id_user'
        // )
        // ->select('survey_perkembangan_wilayah.*', 'survey_perkembangan_wilayah.name as namesurvey', 'image_survey_perkembangan.*', 'image_survey_perkembangan.name as nameimage', 'users.*', 'users.name as nameuser')
        // ->get();

        // dd($datas2);

        //Detail Survey
        // $data_detail = SurveyPerkembangan::with(['user'])->orderBy('users.name', 'asc')->get();
        // $data_detail = SurveyPerkembangan::get()->sortBy(function ($query) {
        //     return $query->user->name;
        // })->all();

        // dd($data_detail);


        // $data_detail = DB::table('survey_perkembangan_wilayah')
        //     ->join(
        //         'image_survey_perkembangan',
        //         'image_survey_perkembangan.id',
        //         '=',
        //         'survey_perkembangan_wilayah.id'
        //     )
        //     ->join(
        //         'users',
        //         'users.id',
        //         '=',
        //         'survey_perkembangan_wilayah.id_user'
        //     )
        //     ->select('survey_perkembangan_wilayah.*', 'survey_perkembangan_wilayah.name as namesurvey', 'image_survey_perkembangan.*', 'image_survey_perkembangan.name as nameimage', 'users.*', 'users.name as nameuser')
        //     ->orderBy('users.name', 'asc')
        //     ->get();

        // dd($data_detail);




        // $pegawai_ajib2 = User::withCount('perkembangan')->whereHas(
        //     'roles',
        //     function ($q) {
        //         $q->where('name', 'surveyer');
        //     }
        // )->get();

        // $checkProgress = ProgresSurvey::withCount('survey')->limit(10)->get();
        // // dd($checkProgress[0]->survey_count / $checkProgress[0]->jumlah * 100);
        // // dd($checkProgress[0]->jumlah);
        // dd($checkProgress[0]->survey_count);

        // $cek =  ProgresSurvey::withCount(['survey' => function ($query) {
        //     $query->select(DB::raw('count(distinct(kelurahan))'));
        // }])->get();

        // dd($cek);

        return view('admin.survei_perkembangan', compact(['get_progres_total', 'get_perkembangan_day', 'hasil_jumlah_titik', 'pegawai_ajib2', 'get_id', 'datas']));
    }

    public  function viewSurvey()
    {
        $data_survey = ViewDetil::select("*")->orderBy('tanggal', 'Desc')->get();
        return Datatables::of($data_survey)
            ->editColumn('kelurahan', function ($data) {
                $kel = $data->kelurahan;
                $get_kel = ucwords(strtolower($kel));
                return "$get_kel";
            })
            ->editColumn('kecamatan', function ($data) {
                $kec = $data->kecamatan;
                $get_kec = ucwords(strtolower($kec));
                return "$get_kec";
            })
            ->editColumn('tanggal', function ($data) {
                $tgl = $data->tanggal;
                $tanggal = date("d-m-Y", strtotime($tgl));
                return "$tanggal";
            })
            ->rawColumns(['kelurahan', 'kecamatan', 'tanggal'])->make(true);

        // dd($data);
    }

    public  function KinerjaPetugas()
    {
        $data_kinerja = User::withCount(['perkembangan', 'perkembangan_today'])->with('roles')->whereHas(
            'kegiatan',
            function ($q) {
                $q->whereHas('kegiatan', function ($q) {
                    $q->where('nama', 'Survey Perkembangan Wilayah');
                });
            }
        )->get();

        // dd($data_kinerja);

        return Datatables::of($data_kinerja)->make(true);

        // dd($data);
    }

    public  function ProgresSurvey()
    {

        // $survey = ProgresSurvey::withCount('survey')->take(10)->get();

        $survey =  ProgresSurvey::withCount(['survey' => function ($query) {
            $query->select(DB::connection('pgsql')->raw('count(distinct(id_sub_blok))'));
        }, 'kelurahan', 'kecamatan'])->get();

        // dd($survey);


        return Datatables::of($survey)
            ->editColumn('progres', function ($data) {

                // $hitung->select(DB::raw('count(distinct(ip))'));

                $progress = $data->survey_count / $data->jumlah * 100;

                return "<div class='progress progress-xs'><div class='progress-bar bg-primary' style='width: $progress%'></div></div>";
            })
            ->editColumn('persen', function ($data) {

                // $hitung->select(DB::raw('count(distinct(ip))'));

                $progress = $data->survey_count / $data->jumlah * 100;

                $convert = number_format((float)$progress, 2, '.', '');

                return "<span>$convert%</span>";
            })
            ->editColumn('nama_kel', function ($data) {
                $kel = $data->kelurahan;
                $kalimat = ucwords(strtolower($kel));
                return "$kalimat";
            })
            ->editColumn('nama_kec', function ($data) {
                $kel = $data->kecamatan;
                $kalimat = ucwords(strtolower($kel));
                return "$kalimat";
            })
            ->editColumn('survey_count_null', function ($data) {

                $kalimat = '';
                return "$kalimat";
            })
            ->rawColumns(['survey_count_null', 'progres', 'nama_kel', 'nama_kec', 'persen'])->make(true);

        // dd($survey);
    }



    public function fetchPerkembanganTerbaru($id_data_terbaru)
    {

        // $get_id = Survey::join('users', 'users.id', '=', 'survey.id_user')
        //     ->select('users.*', 'survey.*')
        //     ->orderBy('survey.id', 'Desc')
        //     ->get();

        // $get_perkembangan = SurveyPerkembangan::join('survey', 'survey.id_user', '=', 'survey_perkembangan_wilayah.id_user')
        //     ->select('survey_perkembangan_wilayah.*', 'survey.*')
        //     ->orderBy('survey.id_user', 'Desc')
        //     ->get();

        $tes = SurveyPerkembangan::with('user', 'image')->where('id_baru', (int)$id_data_terbaru)->first();


        // $get_perkembangan =  SurveyPerkembangan::orderBy('id_user', 'Desc')
        //     ->where('survey.id', $id_perkembangan_terbaru)
        //     ->take(1)
        //     ->get();

        return response()->json([
            'perkembangan' => $tes,
        ]);
    }

    public function slideFoto()
    {

        $slide_foto = SurveyPerkembanganImage::orderBy('id', 'DESC')->take(10)->get();

        return response()->json([
            'slide_foto' => $slide_foto,
        ]);
    }



    public function ExportDetilExcel($data)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');
        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(25);
            $spreadSheet->getActiveSheet()->fromArray($data);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];

            $spreadSheet->getActiveSheet()->getStyle('1:1')->applyFromArray($styleArray);

            $spreadSheet->getActiveSheet()->getStyle('B')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadSheet->getActiveSheet()->getStyle('D')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadSheet->getActiveSheet()->getStyle('G')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadSheet->getActiveSheet()->getStyle('I')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadSheet->getActiveSheet()->getStyle('K')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $Excel_writer = new Xls($spreadSheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Detil Input Petugas Survey.xls"');
            header('Cache-Control: max-age=0');
            ob_end_clean();
            $Excel_writer->save('php://output');
            exit();
        } catch (Exception $e) {
            return;
        }
    }

    function ExportDetilSurvey()
    {

        $data = ViewDetil::select("*")->orderBy('tanggal', 'Desc')->get();

        $data_array[] = array("Nama Petugas", "Tanggal Input", "Nama Lokasi", "ID Sub Blok", "Kelurahan", "Kecamatan", "Pola Regional", "Deskripsi Regional", "Pola Lingkungan", "Deskripsi Lingkungan", "Pola Ruang", "Deskripsi Ruang");
        foreach ($data as $data_item) {

            $data_array[] = array(
                'Nama Petugas' => $data_item->petugas,
                'Tanggal Input' => date("d-m-Y", strtotime($data_item->tanggal)),
                'Nama Lokasi' => $data_item->name_tempat,
                'ID Sub Blok' => $data_item->id_sub_blok,
                'Kelurahan' => $data_item->kelurahan,
                'Kecamatan' => $data_item->kecamatan,
                'Pola Regional' => $data_item->regional,
                'Deskripsi Regional' => $data_item->deskripsi_regional,
                'Pola Lingkungan' => $data_item->neighborhood,
                'Deskripsi Lingkungan' => $data_item->deskripsi_neighborhood,
                'Pola Ruang' => $data_item->transect_zone,
                'Deskripsi Ruang' => $data_item->deskripsi_transect_zone
            );
        }
        $this->ExportDetilExcel($data_array);
    }


    public function ExportPetugasExcel($data)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');
        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(25);
            $spreadSheet->getActiveSheet()->fromArray($data);

            $styleArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
            ];

            $spreadSheet->getActiveSheet()->getStyle('1:1')->applyFromArray($styleArray);

            $spreadSheet->getActiveSheet()->getStyle('D:F')
                ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $Excel_writer = new Xls($spreadSheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Kinerja Petugas Survey.xls"');
            header('Cache-Control: max-age=0');
            ob_end_clean();
            $Excel_writer->save('php://output');
            exit();
        } catch (Exception $e) {
            return;
        }
    }

    function ExportPetugasSurvey()
    {

        $data_kinerja = User::withCount(['perkembangan', 'perkembangan_today'])->with('roles')->whereHas(
            'kegiatan',
            function ($q) {
                $q->whereHas('kegiatan', function ($q) {
                    $q->where('nama', 'Survey Perkembangan Wilayah');
                });
            }
        )->get();


        $data_array[] = array("Nama Petugas AJIB", "Penempatan", "Role", "Input Hari Ini", "Input Total");
        foreach ($data_kinerja as $data_item) {

            $data_array[] = array(
                'Nama Petugas AJIB' => $data_item->name,
                'Penempatan' =>  $data_item->penempatan,
                'Role' =>  $data_item->roles[0]->name,
                'Input Hari Ini' => (string)$data_item->perkembangan_today_count,
                'Input Total' => (string)$data_item->perkembangan_count,
            );
        }
        $this->ExportPetugasExcel($data_array);
    }
}
