<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\GrafikChartController;
use App\Http\Controllers\DigitasiController;
use App\Http\Controllers\KBLIPusdatin;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\pinLocationController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\RequireDataChatController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\SurveyerController;
use App\Http\Controllers\RekapSurveyController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\PagePDFController;
use App\Http\Controllers\SurveyPerkembanganController;
use App\Models\Survey;
use App\Models\SurveyPerkembangan;
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


// Route::get('/', function () {
// });

Route::get('/', function (Request $request) {
    // $agent = new Agent();
    // if ($agent->isMobile() || $agent->isTablet()) {
    //     return view('block');
    // }
    return view('layout.main');
})->name('home');


//KBLI PUSDATIN
Route::get('/kbli/{subzona}', [KBLIPusdatin::class, 'kegiatan']);
Route::get('/kbli/{subzona}/{kegiatan}', [KBLIPusdatin::class, 'skala']);
Route::get('/kbli/{subzona}/{kegiatan}/{skala}', [KBLIPusdatin::class, 'kewenangan']);

//cek Login Chat
Route::get('/cekLoginChat', function (Request $request) {
    if (Auth::check()) {
        return true;
    } else {
        $request->session()->put('cek-login', 'login');
        return false;
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
    Route::get('/tambahKuesioner', [AdminController::class, 'tambah_kuesioner'])->name('tambah_kuesioner');
    Route::get('/kosongKuesioner', [AdminController::class, 'kosong_kuesioner'])->name('kosong_kuesioner');
    Route::get('/listKuesioner', [AdminController::class, 'list_kuesioner'])->name('list_kuesioner');
    Route::get('/IsiKuesioner', [AdminController::class, 'isi_kuesioner'])->name('isi_kuesioner');
    Route::get('/PerkembanganSurvey', [AdminController::class, 'perkembangan_survey'])->name('perkembangan-survey');

    Route::get('/fetch-perkembangan', [AdminController::class, 'fetchPerkembangan'])->name('fetch-perkembangan');

    Route::get('/perkembangan-terbaru/{id_data_terbaru}', [AdminController::class, 'fetchPerkembanganTerbaru'])->name('perkembangan-terbaru');

    Route::get('/titik-rekap-survey', [RekapSurveyController::class, 'index'])->name('titik-rekap-survey');

    Route::get('/slide-foto', [AdminController::class, 'slideFoto'])->name('slide-foto');


    Route::get('/get-view-survey', [AdminController::class, 'viewSurvey'])->name('get-view-survey');

    Route::get('/get-kinerja-petugas', [AdminController::class, 'KinerjaPetugas'])->name('get-kinerja-petugas');
});

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
Route::get('/layerSurveyPerkembangan', [SurveyPerkembanganController::class, 'layerSurveyPerkembangan'])->name('layer-survey-perkembangan');
Route::get('/survey/{kelurahan}', [SurveyPerkembanganController::class, 'surveyKelurahan'])->name('survey-perkembangan-kelurahan');
Route::post('/importSurvey', [SurveyPerkembanganController::class, 'importExcelSurvey'])->name('import-survey-perkembangan');
Route::get('/importExcelSurvey', function () {
    return view('importExcelSurvey');
})->name('export-survey-perkembangan');

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

//PHP INFO
// Route::get('/createUserPNS', function () {
//     $data = array(
//         array("val0" => "Andini", "val1" => "andinindy29@gmail.com"),
//         array("val0" => "Iksandi Nugraha", "val1" => "iksandinugraha1994@gmail.com"),
//         array("val0" => "Wildan", "val1" => "wildanhidayatwildan@gmail.com"),
//         array("val0" => "Dea Zulfia", "val1" => "deazulfia66@gmail.com"),
//         array("val0" => "Winda", "val1" => "windasiadarii@gmail.com"),
//         array("val0" => "Muhammad Sutan Syauqi Ferbian G", "val1" => " sutan.girsang@gmail.com"),
//         array("val0" => "Nadya Rahmi Maghfira", "val1" => "nad.rahmi22@gmail.com"),
//         array("val0" => "Abraham Yudha K.S", "val1" => "abrahamyksilaban@gmail.com"),
//         array("val0" => "Andina Oktavia Sulistya Putri", "val1" => "andinaoktavias@gmail.com"),
//         array("val0" => "Mery Anggrina", "val1" => "anggrinamery@gmail.com"),
//         array("val0" => "Eka Triakuntini", "val1" => "ekatriakuntini@gmail.com"),
//         array("val0" => "Siti Nurvira Zanirah", "val1" => "virazanirah@gmail.com"),
//         array("val0" => "Quina Virmaya", "val1" => "quinavirmy@gmail.com"),
//         array("val0" => "Fadhila I S", "val1" => "fad_is@yahoo.com"),
//         array("val0" => "Maretta Arninda Dianty", "val1" => "marettadianty@gmail.com"),
//         array("val0" => "Ansellia Septarini", "val1" => "anselliaseptarini@gmail.com"),
//         array("val0" => "M irfan aprianda", "val1" => "irfanaprianda@gmail.com"),
//         array("val0" => "Khasri Thamrin P", "val1" => "khasrixap@gmail.com"),
//         array("val0" => "Faiz Abdurrahman", "val1" => "faiz.abdurrahman92@gmail.com"),
//         array("val0" => "Abiel Timothy", "val1" => "abieltimothy@gmail.com"),
//         array("val0" => "Teguh Budianto", "val1" => "tbteguhbudianto@gmail.com"),
//         array("val0" => "Icha Apriliyeni", "val1" => "ichaapriliy@gmail.com"),
//         array("val0" => "Maryam Muthiah", "val1" => "maryammuthiah91@gmail.com"),
//         array("val0" => "Faqih Shokhib Anugerah", "val1" => "faqihsokhib@gmail.com"),
//         array("val0" => "Ikhsan Anwar F", "val1" => "fuadinwr@gmail.com"),
//         array("val0" => "Indra Maulana", "val1" => "pancaindra5th@gmail.com"),
//         array("val0" => "Yoanda Dimastria", "val1" => "yoandadimastria29@gmail.com"),
//         array("val0" => "Sayoga Pradana", "val1" => "sayogapra@gmail.com"),
//         array("val0" => "Ratih Gita Astari", "val1" => "astari.rg@gmail.com"),
//         array("val0" => "Sentanu Aji ", "val1" => "sentanuaji03@gmail.com"),
//         array("val0" => "Sekar", "val1" => "sekaramadyani@gmail.com"),
//         array("val0" => "Mus", "val1" => "mus.mukandar39@gmail.com"),
//         array("val0" => "Ferdinand", "val1" => "ferdinandmsimatupang@gmail.com"),
//         array("val0" => "Masfu Maarif", "val1" => "masfu.account@gmail.com"),
//         array("val0" => "Nauval Ghifari", "val1" => "nauval.ghifari@gmail.com"),
//         array("val0" => "Windy Lestari", "val1" => "Lwindy1996@gmail.com"),
//         array("val0" => "Khairina HP", "val1" => "khairinaheldiputri@gmail.com"),
//         array("val0" => "Iqbal P. Putra", "val1" => "iqbal.permana.putra@gmail.com"),
//         array("val0" => "Paras Ayu Cinta", "val1" => "parasajoe@gmail.com"),
//         array("val0" => "Diah Ismi Anggraini Putri", "val1" => "Diahismiap01@gmail.com"),
//         array("val0" => "Sherin Ajeng Norliani", "val1" => "sherinajeng13@gmail.com"),
//         array("val0" => "Muh. Aqsyah", "val1" => "Aqsyah.gd@gmail.com"),
//     );

//     // dd($data);
//     foreach ($data as $d) {
//         // echo $d['val0'] . '-' . $d['val1'] . '<br>';
//         $data = User::create([
//             'name' => $d['val0'],
//             'email' => $d['val1'],
//             'provider' => 'google',
//         ]);
//         $data->assignRole('user');
//     }
// });
