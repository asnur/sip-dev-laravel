<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\KBLIPusdatin;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\pinLocationController;
use App\Http\Controllers\RequireDataChatController;
use App\Http\Controllers\SocialiteController;
use App\Models\User;
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
    if (isMobileDevice()) {
        return redirect()->to('/mobile');
    }
    return view('layout.main');
})->name('home');

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
});

Route::get('/analytics/{periode}', [AnalyticsController::class, 'index']);
