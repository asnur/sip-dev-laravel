<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\KBLIPusdatin;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\pinLocationController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\RequireDataChatController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\SurveyerController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\PagePDFController;


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
    $authUser = User::where('provider_id', $request->input('provider_id'))->first();
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
    Route::put('/pegawaiAjib', [AdminController::class, 'update_pegawai_ajib'])->name('update-pegawai');
    Route::delete('/pegawaiAjib', [AdminController::class, 'delete_pegawai_ajib'])->name('delete-pegawai');
    Route::get('/kinerja', [AdminController::class, 'kinerja_pegawai_ajib'])->name('kinerja-pegawai');
    Route::post('/kinerja', [AdminController::class, 'kinerja'])->name('kinerja-surveyer');
    Route::get('/titik', [SurveyerController::class, 'index'])->name('titik');

    Route::get('/fetch-surveyer', [AdminController::class, 'fetchSurveyer'])->name('fetch-surveyer');
    Route::get('/data-terbaru/{id_data_terbaru}', [AdminController::class, 'dataTerbaru'])->name('data-terbaru');

    Route::get('/pegawaiDataAjib/{pegawai_id}', [AdminController::class, 'data_edit_pegawai'])->name('edit-data-pegawai');
});

//Analytics Page
Route::get('/analytics/{periode}', [AnalyticsController::class, 'index']);


ROUTE