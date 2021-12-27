<?php

use App\Http\Controllers\KBLIPusdatin;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\pinLocationController;
use App\Http\Controllers\RequireDataChatController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
    $status = $request->session()->get('cek-login');
    // if ($status == 'login') {
    //     echo "<script>window.close();</script>";
    // }
    return view('layout.main');
});

Route::get('/kbli/{subzona}', [KBLIPusdatin::class, 'kegiatan']);
Route::get('/kbli/{subzona}/{kegiatan}', [KBLIPusdatin::class, 'skala']);
Route::get('/kbli/{subzona}/{kegiatan}/{skala}', [KBLIPusdatin::class, 'kewenangan']);

//For PDF Fitur
// Route::post('/setKelurahan/{kelurahan}', [PDFController::class, 'setKelurahan']);
// Route::post('/savePDF', [PDFController::class, 'savePDF']);

//cek Login Chat
Route::get('/cekLoginChat', function (Request $request) {
    if (Auth::check()) {
        return true;
    } else {
        $request->session()->put('cek-login', 'login');
        return false;
    }
});

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

Auth::routes();


//Pin Location
Route::get('/getIdUser', [pinLocationController::class, 'getIdUser']);
Route::get('/getDataPin/{id_user}', [pinLocationController::class, 'getData']);
Route::post('/saveDataPin/{id_user}', [pinLocationController::class, 'saveData']);
Route::post('/deleteDataPin/{id_data}', [pinLocationController::class, 'deleteData']);

//For Login Google
Route::get('/auth/redirect', [SocialiteController::class, 'redirectToProvider'])->name('login-google');
Route::get('/auth/callback', [SocialiteController::class, 'handleProviderCallback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
