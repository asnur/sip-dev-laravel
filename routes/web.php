<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\GrafikChartController;
use App\Http\Controllers\DigitasiController;
use App\Http\Controllers\KBLIPusdatin;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\pinLocationController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\RequireDataChatController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\SurveyerController;
use App\Http\Controllers\RekapSurveyController;
use App\Models\User;
use App\Models\ViewDetil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\PagePDFController;
use App\Http\Controllers\PendataanUsahaController;
use App\Http\Controllers\SektorController;
use App\Http\Controllers\SurveyPerkembanganController;
use App\Models\KegiatanUser;
use App\Models\PendataanUsaha;
use App\Models\Survey;
use App\Models\SurveyPerkembangan;
use App\Models\ProgresSurvey;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function (Request $request) {
    return view('layout.main');
})->middleware('auth')->name('home');


//KBLI PUSDATIN
Route::get('/kbli/{subzona}', [KBLIPusdatin::class, 'kegiatan']);
Route::get('/kbli/{subzona}/{kegiatan}', [KBLIPusdatin::class, 'skala']);
Route::get('/kbli/{subzona}/{kegiatan}/{skala}', [KBLIPusdatin::class, 'kewenangan']);

//cek Login Chat
Route::get('/cekLoginChat', function (Request $request) {
    if (Auth::check()) {
        $data = [
            'status' => true,
            'id' => Auth::user()->id,
        ];
        return $data;
    } else {
        $request->session()->put('cek-login', 'login');
        $data = [
            'status' => false,
            'id' => null,
        ];
        return $data;
    }
});

//Login Status
Route::get('/statusLogin', function (Request $request) {
    $status = $request->session()->get('cek-login');

    if ($status) {
        return $status;
    } else {
        return 'no login';
    }
});

Route::get('/cekSession', function () {
    dd(session('kelurahan'), session('id_kelurahan'));
});

//Save Data Kelurahan
Route::get('/saveKelurahan/{kelurahan}', [RequireDataChatController::class, 'save']);
Route::post('/saveUser', function (Request $request) {
    $authUser = User::where('email', $request->input('email'))->first();
    if ($authUser) {
        $dataUser = $authUser;
        // return $dataUser;
    } else {
        $data = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'provider' => $request->input('provider'),
            'provider_id' => $request->input('provider_id')
        ]);
        $dataUser = $data;
        $data->assignRole('user');
        // return $dataUser;
    }
    Auth::login($dataUser, true);
});
Route::get('/getIdUser', [pinLocationController::class, 'getIdUser']);


//Print PDF Route
Route::get('/print', [PrintController::class, 'print'])->name('print');
Route::post('/save_image', [PrintController::class, 'save_image'])->name('save-image');
Route::post('/save_wilayah', [PrintController::class, 'save_wilayah'])->name('save-wilayah');
Route::post('/save_kordinat', [PrintController::class, 'save_kordinat'])->name('save-kordinat');
Route::post('/save_eksisting', [PrintController::class, 'save_eksisting'])->name('save-eksisting');
Route::post('/save_njop', [PrintController::class, 'save_njop'])->name('save-njop');
Route::post('/save_bpn', [PrintController::class, 'save_bpn'])->name('save-bpn');
Route::post('/save_chart_pie', [PrintController::class, 'save_chart_pie'])->name('save-chart_pie');
Route::post('/save_chart_bar', [PrintController::class, 'save_chart_bar'])->name('save-chart_bar');
Route::post('/save_sanitasi', [PrintController::class, 'save_sanitasi'])->name('save-sanitasi');
Route::post('/save_turun', [PrintController::class, 'save_turun'])->name('save-turun');
Route::post('/save_air_tanah', [PrintController::class, 'save_air_tanah'])->name('save-air-tanah');
Route::post('/save_zoning', [PrintController::class, 'save_zoning'])->name('save-zoning');
Route::post('/save_itbx', [PrintController::class, 'save_itbx'])->name('save-itbx');
Route::post('/save_ketentuan_tpz', [PrintController::class, 'save_ketentuan_tpz'])->name('save-ketentuan-tpz');
Route::post('/save_ketentuan_khusus', [PrintController::class, 'save_ketentuan_khusus'])->name('save-ketentuan-khusus');
Route::post('/save_poi', [PrintController::class, 'save_poi'])->name('save-poi');
Route::post('/save_kbli', [PrintController::class, 'save_kbli'])->name('save-kbli');
Route::post('/check_print', [PrintController::class, 'check_print'])->name('check-print');

//Dokumen Dasar
Route::get('/dokumen-dasar-dan-panduan', [PagePDFController::class, 'Dokumen']);

Auth::routes();


//Pin Location
Route::get('/getDataPin/{id_user}', [pinLocationController::class, 'getData']);
Route::post('/saveDataPin', [pinLocationController::class, 'saveData']);
Route::post('/saveEditDataPin', [pinLocationController::class, 'saveEditData']);
Route::post('/detailDataPin', [pinLocationController::class, 'detailData']);
Route::post('/editDataPin', [pinLocationController::class, 'editData']);
Route::post('/deleteDataPin', [pinLocationController::class, 'deleteData']);
Route::post('/deleteImage', [pinLocationController::class, 'deleteImage']);

//For Login Google
Route::get('/auth/redirect', [SocialiteController::class, 'redirectToProvider'])->name('login-google');
Route::get('/auth/callback', [SocialiteController::class, 'handleProviderCallback']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Kuesioner
Route::get('/kuesioner/{id}', [KuesionerController::class, 'getKuesioner']);
Route::post('/file_kuesioner', [KuesionerController::class, 'saveFoto']);
Route::delete('/kuesioner-delete', [KuesionerController::class, 'deleteKuesioner'])->name('delete-kuesioner');

//Admin Page
Route::prefix('/admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('home-admin');
    Route::get('/role', [AdminController::class, 'role_management'])->name('role');
    Route::get('/user', [AdminController::class, 'user_management'])->name('user');
    Route::post('/addUser', [AdminController::class, 'add_user'])->name('add-user');
    Route::post('/editUser', [AdminController::class, 'update_user'])->name('update-user');
    Route::delete('/deleteUser', [AdminController::class, 'delete_user'])->name('delete-user');

    Route::get('/pegawaiAjib', [AdminController::class, 'pegawai_ajib'])->name('pegawai');
    Route::post('/pegawaiAjib', [AdminController::class, 'add_pegawai_ajib'])->name('add-pegawai');
    Route::get('/ShowPegawaiAjib/{id}', [AdminController::class, 'show_pegawai_ajib'])->name('show-pegawai');
    Route::put('/pegawaiAjib', [AdminController::class, 'update_pegawai_ajib'])->name('update-pegawai');
    Route::delete('/pegawaiAjib', [AdminController::class, 'delete_pegawai_ajib'])->name('delete-pegawai');

    Route::get('/RekapInput', [AdminController::class, 'kinerja_pegawai_ajib'])->name('kinerja-pegawai');
    Route::get('/kinerjaData', [AdminController::class, 'kinerja_data'])->name('kinerja-data');
    Route::post('/kinerja', [AdminController::class, 'kinerja'])->name('kinerja-surveyer');
    Route::get('/titik', [SurveyerController::class, 'index'])->name('titik');

    Route::get('/fetch-surveyer', [AdminController::class, 'fetchSurveyer'])->name('fetch-surveyer');
    Route::get('/data-terbaru/{id_data_terbaru}', [AdminController::class, 'dataTerbaru'])->name('data-terbaru');

    Route::get('/pegawaiDataAjib/{pegawai_id}', [AdminController::class, 'data_edit_pegawai'])->name('edit-data-pegawai');
    Route::get('Ekspor-Kinerja/{kelurahan?}', [AdminController::class, 'pdf_kinerja'])->name('ekspor-kinerja');

    // Route::get('/Kuesioner', [AdminController::class, 'kuesioner'])->name('kuesioner');
    Route::get('/kuesioner', [AdminController::class, 'kuesioner'])->name('kuesioner');
    Route::get('/tambahKuesioner', [AdminController::class, 'tambah_kuesioner'])->name('tambah_kuesioner');
    Route::get('/editKuesioner/{id}', [AdminController::class, 'edit_kuesioner'])->name('edit_kuesioner');
    Route::get('/listKuesioner', [AdminController::class, 'list_kuesioner'])->name('list_kuesioner');

    Route::get('/jawaban/{id}', [AdminController::class, 'jawaban_kuesioner'])->name('jawaban_kuesioner');

    Route::get('/IsiKuesioner', [AdminController::class, 'isi_kuesioner'])->name('isi_kuesioner');
    Route::get('/PerkembanganSurvey', [AdminController::class, 'perkembangan_survey'])->name('perkembangan-survey');


    Route::get('/fetch-perkembangan', [AdminController::class, 'fetchPerkembangan'])->name('fetch-perkembangan');

    Route::get('/perkembangan-terbaru/{id_data_terbaru}', [AdminController::class, 'fetchPerkembanganTerbaru'])->name('perkembangan-terbaru');

    Route::get('/titik-rekap-survey', [RekapSurveyController::class, 'index'])->name('titik-rekap-survey');

    Route::get('/slide-foto', [AdminController::class, 'slideFoto'])->name('slide-foto');

    Route::get('/get-view-survey', [AdminController::class, 'viewSurvey'])->name('get-view-survey');

    Route::get('/get-kinerja-petugas', [AdminController::class, 'KinerjaPetugas'])->name('get-kinerja-petugas');

    Route::get('/get-progres-survey', [AdminController::class, 'ProgresSurvey'])->name('get-progres-survey');

    Route::get('/peta-survey/{id}', [RekapSurveyController::class, 'petaSurvey'])->name('peta-survey');

    Route::get('/detil-petugas-survey', [AdminController::class, 'ExportDetilSurvey'])->name('detil-petugas-survey');

    Route::get('/kinerja-petugas-survey', [AdminController::class, 'ExportPetugasSurvey'])->name('kinerja-petugas-survey');

    // Pendataan Usaha
    Route::get('/pendataanUsaha', [PendataanUsahaController::class, 'PendataanUsaha'])->name('pendataan_usaha');

    Route::get('/get-pendataan-usaha', [PendataanUsahaController::class, 'GetDataPendataanUsaha'])->name('get-pendataan-usaha');
});

// tabel kelurahan

Route::get('/progres-perkelurahan', function () {
    $data =  ProgresSurvey::withCount(['survey' => function ($query) {
        $query->select(DB::connection('pgsql')->raw('count(distinct(id_sub_blok))'));
    }])->orderBy('kecamatan')->get();

    return view('admin/progres-perkelurahan', compact('data'));
})->name('progres-perkelurahan');

//Analytics Page
Route::get('/analytics/{periode}', [AnalyticsController::class, 'index']);

Route::post('/digitasi', [DigitasiController::class, 'index'])->name('digitasi');


//Survey Perkembangan
Route::get('/getDataSurvey/{id_survey}', [SurveyPerkembanganController::class, 'getDataSurvey'])->name('survey-perkembangan');
Route::get('/getAllDataSurvey', [SurveyPerkembanganController::class, 'getAllDataSurvey'])->name('survey-perkembangan');
Route::post('/detailDataSurvey', [SurveyPerkembanganController::class, 'detailDataSurvey'])->name('save-survey-perkembangan');
Route::post('/saveDataSurvey', [SurveyPerkembanganController::class, 'saveDataSurvey'])->name('save-survey-perkembangan');
Route::post('/saveEditDataSurvey', [SurveyPerkembanganController::class, 'saveEditDataSurvey'])->name('save-survey-perkembangan');
Route::post('/editDataSurvey', [SurveyPerkembanganController::class, 'editDataSurvey'])->name('edit-survey-perkembangan');
Route::post('/deleteDataSurvey', [SurveyPerkembanganController::class, 'deleteDataSurvey'])->name('delete-survey-perkembangan');
Route::post('/deleteImageSurvey', [SurveyPerkembanganController::class, 'deleteImageSurvey'])->name('delete-image-survey-perkembangan');
Route::get('/printSurvey', [SurveyPerkembanganController::class, 'printSurvey'])->name('print-survey-perkembangan');
Route::get('/printSurveyExcel', [SurveyPerkembanganController::class, 'printSurveyExcel'])->name('print-survey-perkembangan');
Route::get('/layerSurveyPerkembangan', [SurveyPerkembanganController::class, 'layerSurveyPerkembangan'])->name('layer-survey-perkembangan');
Route::get('/layerSurveyPerkembanganPartner', [SurveyPerkembanganController::class, 'layerSurveyPerkembanganPartner'])->name('layer-survey-perkembanganPartner');
Route::get('/survey/{kelurahan}', [SurveyPerkembanganController::class, 'surveyKelurahan'])->name('survey-perkembangan-kelurahan');
Route::post('/importSurvey', [SurveyPerkembanganController::class, 'importExcelSurvey'])->name('import-survey-perkembangan');
Route::get('/importExcelSurvey', function () {
    return view('importExcelSurvey');
})->name('export-survey-perkembangan');

//Pendataan Usaha
Route::post('/savePendataanUsaha', [PendataanUsahaController::class, 'savePendataanUsaha'])->name('pendataan-usaha');
Route::post('/getPendataanUsaha', [PendataanUsahaController::class, 'getPendataanUsaha'])->name('pendataan-usaha');
Route::get('/getPendataanUsaha/{id}', [PendataanUsahaController::class, 'getPendataanUsahaById'])->name('pendataan-usaha');
Route::post('/deletePendataanUsaha', [PendataanUsahaController::class, 'deletePendataanUsaha'])->name('delete-pendataan-usaha');
Route::get('/printUsahaExcel', [PendataanUsahaController::class, 'printUsahaExcel'])->name('print-usaha-excel');
Route::post('/deleteImageUsaha', [PendataanUsahaController::class, 'deleteImageUsaha'])->name('delete-image-usaha');

//Export Data
Route::get('/data-jumlah-titik', function () {
    $data = User::withCount('perkembangan')->orderBy('perkembangan_count', 'DESC')->whereHas(
        'roles',
        function ($q) {
            $q->whereIn('name', ['CPNS', 'ajib-kecamatan']);
        }
    )->get();

    return view('survey-titik-excel', compact('data'));
})->name('export-data-titik');

Route::get('/detail-data-titik', function () {
    $data = SurveyPerkembangan::with('user')->get()->sortBy(function ($query) {
        return $query->user->name;
    })->all();

    return view('detail-data-titik', compact('data'));
})->name('export-data-detail');
Route::get('/imageSurvey/{transaction_id}', [SurveyPerkembanganController::class, 'exportImageSurvey'])->name('image-survey');


//Get Sektor
Route::get('/sektor/{sektor}', [SektorController::class, 'getData'])->name('get-sektor');

Route::get('/phpinfo', function () {
    return phpinfo();
})->name('phpinfo');

//Testing Time
Route::get('/time', function () {
    // date_default_timezone_set('Asia/Jakarta');
    return date('Y-m-d H:i:s');
});

//PHP INFO
Route::get('/createUser', function () {
    $data = array(
        array("val0" => "Sukirno", "val1" => "UP PMPTSP Kel. Petukangan Utara", "val2" => "Kepala Unit Kel. Petukangan Utara", "val3" => "ptsppetukanganutara@gmail.com"),
        array("val0" => "Faulinza", "val1" => "UP PMPTSP Kel. Kalibata", "val2" => "Kepala Unit Kel. Kalibata", "val3" => "faulinza66@gmail.com"),
        array("val0" => "Yarief Yusuf", "val1" => "UP PMPTSP Kel. Bangka", "val2" => "Kepala Unit Kel. Bangka", "val3" => "ptspbangka@gmail.com"),
        array("val0" => "Eko Prasetyo A", "val1" => "UP PMPTSP Kel. Gelora", "val2" => "Kepala Unit Kel. Gelora", "val3" => "eco.prasetyo0@gmail.com"),
        array("val0" => "Maria Octavia", "val1" => "UP PMPTSP Kel. Cipete Selatan", "val2" => "Kepala Unit Kel. Cipete Selatan", "val3" => "ptsp.mos@gmail.com"),
        array("val0" => "I Putu Bagus Setyawan", "val1" => "UP PMPTSP Kel. Pademangan Barat", "val2" => "Kepala Unit Kel. Pademangan Barat", "val3" => "putzgrav@gmail.com"),
        array("val0" => "Rafly Zeldhan", "val1" => "UP PMPTSP Kel. Pasar Minggu", "val2" => "AJIB Kel. Pasar Minggu", "val3" => "ptsppasarminggu01@gmail.com"),
        array("val0" => "Jufri", "val1" => "UP PMPTSP Kel. Ujung Menteng", "val2" => "Kepala Unit Kel. Ujung Menteng", "val3" => "ptsp.ujungmenteng2016@gmail.com"),
        array("val0" => "Budhi Fahlevi", "val1" => "UP PMPTSP Kel. Sukabumi Utara", "val2" => "Kepala Unit Kel. Sukabumi Utara", "val3" => "ptsp.sukabumi.utara@gmail.com"),
        array("val0" => "Chairul Baihaqi", "val1" => "UP PMPTSP Kec. Cakung", "val2" => "Kepala Unit Kec. Cakung ", "val3" => "pmptsp.cakung20@gmail.com"),
        array("val0" => "Eti Nurbaiti", "val1" => "UP PMPTSP Kel. Lebak Bulus", "val2" => "Kepala Unit Kel. Lebak Bulus", "val3" => "ptsp.kel.lbkbulus@gmail.com"),
        array("val0" => "Arya Pinandita", "val1" => "UP PMPTSP Kel. Rawa Terate", "val2" => "Kepala Unit Kel. Rawa Terate", "val3" => "ptsp.rawaterate15@gmail.com"),
        array("val0" => "Akhmad Febrianto", "val1" => "UP PMPTSP Kel. Cideng", "val2" => "Kepala Unit Kel. Cideng", "val3" => "febrianto.ptspdki@gmail.com"),
        array("val0" => "Dwi James", "val1" => "UP PMPTSP Kota Administrasi Jakarta Utara", "val2" => "Satpel Pelayanan II Kota Administrasi Jakarta Utara", "val3" => "james.btr@gmail.com"),
        array("val0" => "Rina Renaningtyas", "val1" => "UP PMPTSP Kel. Kebon Jeruk", "val2" => "Kepala Unit Kel. Kebon Jeruk", "val3" => "ptsp.kelurahankebonjeruk@gmail.com"),
        array("val0" => "Rangga Pratama", "val1" => "UP PMPTSP Kel. Ancol", "val2" => "Kepala Unit Kel. Ancol", "val3" => "ptsp.ancol@gmail.com"),
        array("val0" => "Wiwit Hryoko", "val1" => "UP PMPTSP Kel. Ceger", "val2" => "Kepala Unit Kel. Ceger", "val3" => "wiwitharyoko711@gmail.com"),
        array("val0" => "Tri Jaya Karel", "val1" => "UP PMPTSP Kec. Pademangan", "val2" => "Kepala Unit Kec. Pademangan ", "val3" => "ptsp.kecpademangan@gmail.com"),
        array("val0" => "Mundi Anugrah Nindya Putri", "val1" => "UP PMPTSP Kel. Munjul", "val2" => "Kepala Unit Kel. Munjul", "val3" => "moremundy@gmail.com"),
        array("val0" => "Andre Mei Budiartarto", "val1" => "UP PMPTSP Kec. Tanah Abang", "val2" => "Staf Teknis Kec. Tanah Abang", "val3" => "ptsptanahabang@gmail.com"),
        array("val0" => "Mohamad Ardi Firmansyah", "val1" => "UP PMPTSP Kec. Gambir", "val2" => "Staf Teknis Kec. Gambir", "val3" => "ptsp.kec.gambir@gmail.com"),
        array("val0" => "Fahrozi Hardi", "val1" => "UP PMPTSP Kel. Pademangan Timur", "val2" => "Kepala Unit Kel. Pademangan Timur", "val3" => "fahrozi.hardi86@gmail.com"),
        array("val0" => "Wahyu Catur Mardiyanto", "val1" => "UP PMPTSP Kel. Petojo Selatan", "val2" => "Kepala Unit Kel. Petojo Selatan", "val3" => "wahyucatur@gmail.com"),
        array("val0" => "Atikah", "val1" => "UP PMPTSP Kel. Cakung Barat", "val2" => "Kepala Unit Kel. Cakung Barat", "val3" => "ptsp.cakungbarat@gmail.com"),
        array("val0" => "Drs. Wagiman, MT", "val1" => "UP PMPTSP Kec. Kembangan", "val2" => "Kasubbag TU Kec. Kembangan", "val3" => "wagechaniago69@gmail.com"),
        array("val0" => "Apip Sapyudin", "val1" => "UP PMPTSP Kel. Penggilingan", "val2" => "Kepala Unit Kel. Penggilingan", "val3" => "afivo68@gmail.com"),
        array("val0" => "Triyaningsih", "val1" => "UP PMPTSP Kel. Cakung Timur", "val2" => "Kepala Unit Kel. Cakung Timur", "val3" => "trianingsih000111@gmail.com"),
        array("val0" => "Sisrini", "val1" => "UP PMPTSP Kota Administrasi Jakarta Barat", "val2" => "Ka. Satpel PM Kota Administrasi Jakarta Barat", "val3" => "ptspjbsatpelpm@gmail.com"),
        array("val0" => "Elon Suhadmal Widagdo", "val1" => "UP PMPTSP Kel. Menteng", "val2" => "Kepala Unit Kel. Menteng", "val3" => "elonds@gmail.com"),
        array("val0" => "Heru Pamilih", "val1" => "UP PMPTSP Kel. Kebon Kelapa", "val2" => "Kepala Unit Kel. Kebon Kelapa", "val3" => "ptspkbkelapa@gmail.com"),
        array("val0" => "Irma Nursyarifah", "val1" => "UP PMPTSP Kel. Duri Kepa", "val2" => "Kepala Unit Kel. Duri Kepa", "val3" => "ptspdurikepa@gmail.com"),
        array("val0" => "Kasmai", "val1" => "UP PMPTSP Kel. Pulo Gebang", "val2" => "Kepala Unit Kel. Pulo Gebang", "val3" => "kasmay1967@gmail.com"),
        array("val0" => "Sofrizal", "val1" => "UP PMPTSP Kota Administrasi Jakarta Barat", "val2" => "Kasubbag TU Kota Administrasi Jakarta Barat", "val3" => "sofrizal.jobs@gmail.com"),
        array("val0" => "Hadi Purnomo", "val1" => "UP PMPTSP Kec. Matraman", "val2" => "Staf Teknis Kec. Matraman", "val3" => "upptspkecamatanmatraman2019@gmail.com"),
        array("val0" => "Erni Tri Wulandari", "val1" => "UP PMPTSP Kec. Cengkareng", "val2" => "CRO Kec. Cengkareng", "val3" => "ptspkecamatancengkareng@gmail.com"),
        array("val0" => "Akbar Wahdini Haikal", "val1" => "UP PMPTSP Kel. Kebon Sirih", "val2" => "Kepala Unit Kel. Kebon Sirih", "val3" => "akununtukkerjaane@gmail.com"),
        array("val0" => "Leonardo", "val1" => "UP PMPTSP Kel. Duri Pulo", "val2" => "Kepala Unit Kel. Duri Pulo", "val3" => "ptsp.duripulo@gmail.com"),
        array("val0" => "Hariyadi", "val1" => "UP PMPTSP Kel. Kamal Muara", "val2" => "Kepala Unit Kel. Kamal Muara", "val3" => "ptsp.kamalmuara@gmail.com"),
        array("val0" => "Ferra Avrianty", "val1" => "UP PMPTSP Kel. Cikini", "val2" => "Kepala Unit Kel. Cikini", "val3" => "ptspkelurahan.cikini@gmail.com"),
        array("val0" => "Mohamad Rizky Wirawan", "val1" => "UP PMPTSP Kec. Kembangan", "val2" => "Kepala Unit Kec. Kembangan", "val3" => "rizkywirawanitzc@gmail.com"),
        array("val0" => "Nendah Awalia", "val1" => "UP PMPTSP Kec. Cempaka Putih", "val2" => "Staf Teknis Kel. Cempaka Putih", "val3" => "uppmptspcempakaputih@gmail.com"),
        array("val0" => "Endang Jumiati", "val1" => "UP PMPTSP Kel. Jatinegara", "val2" => "Kepala Unit", "val3" => "jatinegaraptsp@gmail.com"),
        array("val0" => "Petugas Kec. Senen 01", "val1" => "UP PMPTSP Kec. Senen", "val2" => "Staf Teknis Kec. Senen", "val3" => "ptspsenen.jakarta@gmail.com"),
        array("val0" => "Elfa Fidiawati", "val1" => "UP PMPTSP Kec. Cilandak", "val2" => "Staf Teknis Kec. Cilandak", "val3" => "ptsp.kec.cilandak@gmail.com"),
        array("val0" => "Joni Supratman", "val1" => "UP PMPTSP Kel. Gambir", "val2" => "Kepala Unit Kel. Gambir", "val3" => "ptspkelgambir@gmail.com"),
        array("val0" => "Vidya Ratnasuci", "val1" => "UP PMPTSP Kel. Gunung", "val2" => "Kepala Unit Kel. Gunung", "val3" => "vidyaratnani@gmail.com"),
        array("val0" => "Okbye Tribudyawan", "val1" => "UP PMPTSP Kec. Matraman", "val2" => "Pelaksana Kec. Matraman", "val3" => "ptsp.satlak.matraman@gmail.com"),
        array("val0" => "Sumartini", "val1" => "UP PMPTSP Kel. Kembangan Utara", "val2" => "Kepala Unit Kel. Kembangan Utara", "val3" => "Sumartini@gmail.com"),
        array("val0" => "Edi Jumantoro", "val1" => "UP PMPTSP Kel. Petojo Utara", "val2" => "Kepala Unit Kel. Petojo Utara", "val3" => "ptsp.kejora@gmail.com"),
        array("val0" => "Nur'Aeni", "val1" => "UP PMPTSP Kel. Cipinang", "val2" => "Kepala Unit Kel. Cipinang", "val3" => "aannuraeni1974@gmail.com"),
        array("val0" => "Masdalifah", "val1" => "UP PMPTSP Kel. Srengseng", "val2" => "Kepala Unit Kel. Srengseng", "val3" => "masdalifah.ipeh@gmail.com"),
        array("val0" => "Mutiara Dewi", "val1" => "UP PMPTSP Kel. Ulujami", "val2" => "Kepala Unit Kel. Ulujami", "val3" => "ptsp.kel.ulujami@gmail.com"),
        array("val0" => "Farida Ariani", "val1" => "UP PMPTSP Kel.Kedoya Selatan", "val2" => "Plt Kepala Unit Kel. Kedoya Selatan", "val3" => "ptsp.kedoyasel@gmail.com"),
        array("val0" => "Sarmauli. Lumbantoruan", "val1" => "UP PMPTSP Kel.Cipayung", "val2" => "Staf Teknis Kel. Cipayung", "val3" => "Ibuuli1969@gmail.com"),
        array("val0" => "Yeni Oktavia", "val1" => "UP PMPTSP Kec. Johar Baru", "val2" => "Analis Dokumen Perizinan dan Non Perizinan Kec. Johar Baru", "val3" => "yeni.oktavia@gmail.com"),
        array("val0" => "Mundi Anugrah Nindya Putri", "val1" => "UP PMPTSP Kel. Munjul", "val2" => "Kepala Unit Kel. Munjul", "val3" => "moremundy@gmail.com"),
        array("val0" => "Rizkasari Puspita Dewi", "val1" => "UP PMPTSP Kel. Kalideres", "val2" => "Kepala Unit Kel. Kalideres", "val3" => "rizkasaricideng@gmail.com"),
        array("val0" => "Mohamad Saprudin", "val1" => "UP PMPTSP Kel. Tegal Alur", "val2" => "Kepala Unit Kel. Tegal Alur", "val3" => "ptsp.tegalalur@gmail.com"),
        array("val0" => "Muhammad Budiman", "val1" => "UP PMPTSP Kel Penjaringan", "val2" => "Kepala Unit Kel. Penjaringan", "val3" => "panggilgwpt@gmail.com"),
        array("val0" => "Esti Pudjirahayu", "val1" => "UP PMPTSP Kel. Kembangan Selatan", "val2" => "Kepala Unit Kel. Kembangan Selatan", "val3" => "dpmptspkembanganselatan@gmail.com"),
        array("val0" => "Taufik Hidayat", "val1" => "UP PMPTSP Kel. Kebon Melati", "val2" => "Kepala Unit Kel. Kebon Melati", "val3" => "ptsp.kebonmelati@gmail.com"),
        array("val0" => "Agus Darmanto", "val1" => "UP PMPTSP Kec. Kebon Jeruk", "val2" => "Kepala Unit Kec. Kebon Jeruk", "val3" => "uppmptsp.kec.kebonjeruk@gmail.com"),
        array("val0" => "Novan Ardianto", "val1" => "UP PMPTSP Kel. Meruya Selatan", "val2" => "Kepala Unit Kel. Meruya Selatan", "val3" => "novan.dki@gmail.com "),
        array("val0" => "P. Budihartono", "val1" => "UP PMPTSP Kec. Penjaringan", "val2" => "Kepala Unit Kec. Penjaringan", "val3" => "ptsp.kec.penjaringan@gmail.com"),
        array("val0" => "Sugiyarto", "val1" => "UP PMPTSP Kel. Galur", "val2" => "Staf Teknis Kel. Galur", "val3" => "ptspgalur@gmail.com"),
        array("val0" => "Azminullah Al Ridha", "val1" => "UP PMPTSP Kel. Kampung Bali", "val2" => "Kepala Unit Kel. Kampung Bali", "val3" => "azminullah.ptsp@gmail.com"),
        array("val0" => "Daniel J.H. Damanik", "val1" => "UP PMPTSP Kel. Cempaka Putih Barat", "val2" => "Kepala Unit Kel. Cempaka Putih Barat", "val3" => "ptsp.cempakaputihbarat@gmail.com"),
        array("val0" => "Firyanti", "val1" => "UP PMPTSP Kec. Menteng", "val2" => "Staf Teknis Kec. Menteng", "val3" => "ptsp.menteng.kec@gmail.com"),
        array("val0" => "Supratman", "val1" => "UP PMPTSP Kel.Kapuk Muara", "val2" => "Kepala Unit Kel. Kapuk Muara", "val3" => "supratmansemsi@gmail.com"),
        array("val0" => "Drajat Yono", "val1" => "UP PMPTSP Kel. Sumur Batu", "val2" => "Kepala Unit Kel. Sumur Batu", "val3" => "681drajat@gmail.com"),
        array("val0" => "Fitri Permatasari", "val1" => "UP PMPTSP Kel. Pesanggrahan", "val2" => "Staf Teknis Kel. Pesanggrahan", "val3" => "ptspkelpsg@gmail.com"),
        array("val0" => "Poltak Ronald Pandapotan S", "val1" => "UP PMPTSP Kel. Cilincing", "val2" => "Kepala Unit Kel. Cilincing", "val3" => "pronaldps@gmail.com"),
        array("val0" => "Restu Hastowo", "val1" => "UP PMPTSP Kec. Cilincing", "val2" => "Kasubag TU Kec. Cilincing", "val3" => "ptsp.keccilincing@gmail.com"),
        array("val0" => "Erwin Harahap", "val1" => "UP PMPTSP Kel. Semper Barat", "val2" => "Kepala Unit Kel. Semper Barat", "val3" => "erwinharahap1980@gmail.com"),
        array("val0" => "Virda Akmalia Zeniya", "val1" => "UP PMPTSP Kel. Kayu Putih", "val2" => "Kepala Unit Kel. Kayu Putih", "val3" => "virdazeniya@gmail.com"),
        array("val0" => "Mairah", "val1" => "UP PMPTSP Kel. Petukangan Utara", "val2" => "Staf Teknis Kel. Petukangan Utara", "val3" => "ptsppetukanganutara@gmail.com"),
        array("val0" => "Egin Ginanjar", "val1" => "UP PMPTSP Kel Rawamangun", "val2" => "Kepala Unit Kel. Rawamangun", "val3" => "ptsp.kel.rawamangun@gmail.com"),
        array("val0" => "Dwiyatcita Indriasari", "val1" => "UP PMPTSP Kel. Tebet Barat", "val2" => "Kepala Unit Kel. Tebet Barat", "val3" => "worksmart.indrie@gmail.com"),
        array("val0" => "Fajar Sidik", "val1" => "UP PMPTSP Kel. Kalibaru", "val2" => "Kepala Unit Kel. Kalibaru", "val3" => "fs.fajarsidik@gmail.com"),
        array("val0" => "Teguh Wahyudi", "val1" => "UP PMPTSP Kel Petamburan", "val2" => "Kepala Unit Kel. Petamburan", "val3" => "teguhwahyudi76@gmail.com"),
        array("val0" => "Erik Kurniawan", "val1" => "UP PMPTSP Kel Rorotan", "val2" => "Kepala Unit Kel. Rorotan", "val3" => "kurniawanerik75@gmail.com"),
        array("val0" => "Rahmawati", "val1" => "UP PMPTSP Kel Tebet Timur", "val2" => "Staf Teknis Kel. Tebet Timur", "val3" => "ptsp.tebettimur@gmail.com"),
        array("val0" => "Eka Mardiyanti", "val1" => "UP PMPTSP Kel Jati ", "val2" => "Kepala Unit Kel. Jati", "val3" => "ptsp.kelurahanjati@gmail.com"),
        array("val0" => "Esti Kartikaningsih", "val1" => "UP PMPTSP Kel Menteng Atas", "val2" => "Kepala Unit Kel. Menteng Atas", "val3" => "estikartika75@gmail.com"),
        array("val0" => "Ade Adriansyah", "val1" => "UP PMPTSP Kel. Pisangan Timur", "val2" => "Kepala Unit Kel. Pisangan Timur", "val3" => "ptsp.pisangantimur@gmail.com"),
        array("val0" => "Nandang Priatna", "val1" => "UP PMPTSP Kec. Setiabudi", "val2" => "Staf Teknis Kec. Setiabudi", "val3" => "ptspkecamatansetiabudi@gmail.com"),
        array("val0" => "Wilmarahma Sari Sitompul", "val1" => "UP PMPTSP Kel. Kayu Manis", "val2" => "Kepala Unit Kel. Kayu Manis", "val3" => "pelayanan.kayumanis@gmail.com"),
        array("val0" => "Eka Budiana", "val1" => "UP PMPTSP Kel. Semper Timur", "val2" => "Plt Kepala Unit Kel. Semper Timur", "val3" => "ekabudianaistri@gmail.com"),
        array("val0" => "Dani Setiarini", "val1" => "UP PMPTSP Kel Karet", "val2" => "Kepala Unit Kel. Karet Tengsin", "val3" => "setiarinidani@gmail.com"),
        array("val0" => "Frisca Putri", "val1" => "UP PMPTSP Kel. Manggarai", "val2" => "PJLP Penerima Tamu Kel. Manggarai", "val3" => "ptspmanggarai@gmail.contoh"),
        array("val0" => "Ratno Budi Santoso", "val1" => "UP PMPTSP Kel. Pulogadung", "val2" => "Kepala Unit Kel. Pulogadung", "val3" => "Ratno_95@yahoo.co.id"),
        array("val0" => "Maya Anggraini", "val1" => "UP PMPTSP Kel. Marunda", "val2" => "Kepala Unit Kel. Marunda", "val3" => "anggrek.maya@gmail.com"),
        array("val0" => "Hamaya Wulandari", "val1" => "UP PMPTSP Kel. Pejaten Timur", "val2" => "Kepala Unit Kel. Pejaten Timur", "val3" => "ptsppetir@gmail.com"),
        array("val0" => "Qory Fitria", "val1" => "UP PMPTSP Kel. Kelapa Gading Barat", "val2" => "Kepala Unit Kel. Kelapa Gading Barat", "val3" => "ptspgadingbarat@gmail.com"),
        array("val0" => "Nurmalia Safitri", "val1" => "UP PMPTSP Kec. Pancoran", "val2" => "Staf Teknis Kec. Pancoran", "val3" => "nurmaliasaiftri.ok@gmail.com"),
        array("val0" => "Budiman Mador M.O.S", "val1" => "UP PMPTSP Kel. Pasar Manggis", "val2" => "Kepala Unit Kel. Pasar Manggis", "val3" => "jakpintaspasmangbo@gmail.com"),
        array("val0" => "Dwi Rahmawati", "val1" => "UP PMPTSP Kel. Semanan", "val2" => "Kepala Unit Kel. Semanan", "val3" => "dweerah@gmail.com"),
        array("val0" => "Retno Saras Murtiningsih", "val1" => "UP PMPTSP Kec. Kelapa Gading", "val2" => "CRO Kec. Kelapa Gading", "val3" => "aiiyasssaras22@gmail.com"),
        array("val0" => "Esti Pujirahayu", "val1" => "UP PMPTSP Kel. Kembangan Selatan ", "val2" => "Kepala Unit Kel. Kembangan Selatan", "val3" => "dpmptspkembanganselatan@gmail.com"),
        array("val0" => "Riyadi", "val1" => "UP PMPTSP Kec. Pasar Minggu", "val2" => "Staf Teknis Kec. Pasar Minggu", "val3" => "ptspkecpasarminggu@gmail.com"),
        array("val0" => "Dina Meutia Aurora", "val1" => "UP PMPTSP Kel. Joglo", "val2" => "Kepala Unit Kel. Joglo", "val3" => "ptsp.joglo@gmail.com"),
        array("val0" => "Josua", "val1" => "UP PMPTSP Kel. Pegangsaan Dua", "val2" => "Staf Teknis Kel. Pegangsaan Dua", "val3" => "ptsp.pegangsaandua@gmail.com"),
        array("val0" => "Hendry Syahrial", "val1" => "UP PMPTSP Kec. Grogol Petamburan", "val2" => "Kasubag TU Kec. Grogol Petamburan", "val3" => "Ptsp.gropet@gmail.com"),
        array("val0" => "Yadih Efendi", "val1" => "UP PMPTSP Kel. Jelambar", "val2" => "Kepala Unit Kel. Jelambar", "val3" => "ptspjelambar@gmail.com"),
        array("val0" => "Risa Soraya", "val1" => "UP PMPTSP Kec. Kalideres", "val2" => "Kasubag TU Kec. Kalideres", "val3" => "ptspkeckalideres@gmail.com"),
        array("val0" => "Muhamad Mulyadi", "val1" => "UP PMPTSP Kel. Meruya Utara", "val2" => "Kepala Unit Kel. Meruya Utara", "val3" => "ptspmeruyautara@gmail.com"),
        array("val0" => "UP PMPTSP Kec. Kembangan", "val1" => "UP PMPTSP Kec. Kembangan", "val2" => "Kec. Kembangan", "val3" => "ptspkembangan@gmail.com"),
        array("val0" => "Muhammad Isa Brahmana", "val1" => "UP PMPTSP Kel. Kwitang", "val2" => "Kepala Unit Kel. Kwitang", "val3" => "mi.bram.arch@gmail.com"),
        array("val0" => "Boval Jukiansyah", "val1" => "UP PMPTSP Kel. Kebon Pala", "val2" => "Kepala Unit Kel. Kebon Pala", "val3" => "boval801501@gmail.com"),
        array("val0" => "Muhammad Faiz Azhar", "val1" => "UP PMPTSP Kec. Pulo Gadung", "val2" => "Pelaksana Kec. Pulo Gadung", "val3" => "apiznyoo@gmail.com"),
        array("val0" => "Retno Ristiarini", "val1" => "UP PMPTSP Kel. Kramat Jati", "val2" => "Kepala Unit Kel. Kramat Jati", "val3" => "ptspkelkramatjati@gmail.com"),
        array("val0" => "Luki", "val1" => "UP PMPTSP Kel. Balekambang ", "val2" => "Kepala Unit Kel. Balekambang", "val3" => "Ptspbalekambang@gmail.com"),
        array("val0" => "Yulisyahyanti", "val1" => "UP PMPTSP Kel.Cililitan", "val2" => "Staf Teknis Kel. Cililitan", "val3" => "ptspcililitan@gmail.com"),
        array("val0" => "Desiana Kurniawati, A.Md", "val1" => "UP PMPTSP Kel. Tengah", "val2" => "Staf Teknis Kel. Tengah", "val3" => "ptsptengah@gmail.com"),
        array("val0" => "Dwi Yuli Astuti", "val1" => "UP PMPTSP Kel.Cawang", "val2" => "Staf Teknis Kel. Cawang", "val3" => "ptspcawang@gmail.com"),
        array("val0" => "Ari Triyono", "val1" => "UP PMPTSP Kel Srengseng Sawah", "val2" => "Kepala Unit Kel. Srengseng Sawah", "val3" => "ptsp.srengsengsawah@gmail.com"),
        array("val0" => "Mochamad Rizal", "val1" => "UP PMPTSP Kel. Kuningan Barat", "val2" => "Kepala Unit Kel. Kuningan Barat", "val3" => "ptspkuninganbarat@gmail.com"),
        array("val0" => "Mohamad Syarieffuddin", "val1" => "UP PMPTSP Kel. Batu Ampar ", "val2" => "Staf Teknis Kel. Batu Ampar", "val3" => "pedulipemohon21@gmail.com"),
        array("val0" => "Edi Riyanto", "val1" => "UP PMPTSP Kec. Jagakarsa", "val2" => "Kepala Unit Kec. Jagakarsa", "val3" => "ptsp.kec.jagakarsa@gmail.com"),
        array("val0" => "Rusyadi S", "val1" => "UP PMPTSP Kec. Koja", "val2" => "Kepala Unit Kec. Koja", "val3" => "ptspkeckoja@gmail.com"),
        array("val0" => "Efan Heryanto", "val1" => "UP PMPTSP Kel. Dukuh", "val2" => "Staf Teknis Kel. Dukuh", "val3" => "emailbuatkerja99@gmail.com"),
        array("val0" => "Mansuri", "val1" => "UP PMPTSP Kel. Tugu Utara", "val2" => "Kepala Unit Kel. Tugu Utara", "val3" => "ptsptuguutara2@gmail.com"),
        array("val0" => "Nunu Novianti", "val1" => "UP PMPTSP Kel. Palmeriam", "val2" => "Staf Teknis Kel. Palmeriam", "val3" => "ptsp.kelurahanpalmeriam@gmail.com"),
        array("val0" => "Dian Anggraini", "val1" => "UP PMPTSP Kec. Kramat Jati", "val2" => "Staf Teknis Kec. Kramat Jati", "val3" => "ptsp.kecamatankramatjati@gmail.com"),
        array("val0" => "Rizkasari", "val1" => "UP PMPTSP Kel. Kalideres", "val2" => "Kepala Unit Kel. Kalideres", "val3" => "rizkasaricideng@gmail.com"),
        array("val0" => "Army Selvilia Riffani", "val1" => "UP PMPTSP Kec. Tebet", "val2" => "CRO Kec. Tebet", "val3" => "uppmptsptebet@gmail.com"),
        array("val0" => "Tanti Trilyunani Gina Praja", "val1" => "UP PMPTSP Kel. Melawai", "val2" => "Kepala Unit Kel. Melawai", "val3" => "ptspmelawai1@gmail.com"),
        array("val0" => "Muhammad Mukafi", "val1" => "UP PMPTSP Kel. Grogol", "val2" => "Kepala Unit Kel. Grogol", "val3" => "ptsp.grogol@gmail.com"),
        array("val0" => "Hari Keristian", "val1" => "UP PMPTSP Kel. Utan Kayu Utara", "val2" => "Kepala Unit Kel. Utan Kayu Utara", "val3" => "ukujakpintas@gmail.com"),
        array("val0" => "Bagus Mulyanto", "val1" => "UP PMPTSP Kel. Rawa Badak Selatan", "val2" => "Kepala Unit Kel. Rawa Badak Selatan", "val3" => "bagus.bptspdki@gmail.com"),
        array("val0" => "Dian Purwati Sriharso", "val1" => "UP PMPTSP Kota Administrasi Jakarta Pusat", "val2" => "Staf Teknis Kota Administrasi Jakarta Pusat", "val3" => "laporanpmjakpus@gmail.com"),
        array("val0" => "Sefi Nuraini", "val1" => "UP PMPTSP Kec. Pal Merah", "val2" => "CRO Kec. Pal Merah", "val3" => "jakpintas.palmerah@gmail.com"),
        array("val0" => "Yanti Nuryanti", "val1" => "UP PMPTSP Kel. Setu", "val2" => "Kepala Unit Kel. Setu", "val3" => "yanti.nuryanti68@gmail.com"),
        array("val0" => "Adhitya Putra Anugerah", "val1" => "UP PMPTSP Kec. Tamansari", "val2" => "Analis Dokumen Perizinan dan Non Perizinan Kec. Tamansari", "val3" => "adhit.anugerah@gmail.com"),
        array("val0" => "Dariyus Yanuarsyah", "val1" => "UP PMPTSP Kel. Kalianyar", "val2" => "Kepala Unit Kel. Kalianyar", "val3" => "yanuarsyahd@gmail.com"),
        array("val0" => "Dian Permata Sari", "val1" => "UP PMPTSP Kel. Jati Padang", "val2" => "Kepala Unit Kel. Jati Padang", "val3" => "dianps.dki@gmail.com "),
        array("val0" => "Sumarna", "val1" => "UP PMPTSP Kel. Kebagusan", "val2" => "Staf Teknis Kel. Kebagusan", "val3" => "ptspkebagusan@gmail.com"),
        array("val0" => "Dede Sunarya", "val1" => "UP PMPTSP Kec. Kebayoran Lama", "val2" => "Staf Teknis Kec. Kebayoran Lama", "val3" => "pmptsp.kec.kebayoran.lama@gmail.com"),
        array("val0" => "Ahmadra Penta Wardana Putra", "val1" => "UP PMPTSP Kel. Cipedak", "val2" => "Kepala Unit Kel. Cipedak", "val3" => "Ptsp.kel.jagakarsa@gmail.com"),
        array("val0" => "Suprapto", "val1" => "UP PMPTSP Kel. Tanjung Barat", "val2" => "Kepala Unit Kel. Tanjung Barat", "val3" => "ptsp.tanjungbarat@gmail.com"),
        array("val0" => "Ramalani", "val1" => "UP PMPTSP Kel. Setia Budi", "val2" => "Kepala Unit Kel. Setia Budi", "val3" => "ptspkelurahansetiabudi@gmail.com"),
        array("val0" => "Dena Erdiani", "val1" => "UP PMPTSP Kel. Pondok Ranggon", "val2" => "Kepala Unit Kel. Pondok Ranggon", "val3" => "Ptsp.kelpondokranggon@gmail.com")
    );

    // dd($data);
    foreach ($data as $d) {
        // echo $d['val0'] . '-' . $d['val1'] . '<br>';
        $data = User::create([
            'name' => $d['val0'],
            'penempatan' => $d['val1'],
            'jabatan' => $d['val2'],
            'email' => strtolower($d['val3']),
            'provider' => 'google',
        ]);
        $data->assignRole('user');
        KegiatanUser::create([
            'user_id' => $data->id,
            'kegiatan_id' => 1
        ]);
    }
});
