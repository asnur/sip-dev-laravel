<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MenuController;
use App\Http\Controllers\KBLIPusdatin;

use Illuminate\Http\Request;

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
    if ($status == 'login') {
        echo "<script>window.close();</script>";
    }
    return view('layout.main');
});

Route::get('/kbli/{subzona}', [KBLIPusdatin::class, 'kegiatan']);
Route::get('/kbli/{subzona}/{kegiatan}', [KBLIPusdatin::class, 'skala']);
Route::get('/kbli/{subzona}/{kegiatan}/{skala}', [KBLIPusdatin::class, 'kewenangan']);


// Route::get('/lokasi', [MenuController::class, 'lokasi'])->name('lokasi');
// Route::get('/ekonomi', [MenuController::class, 'ekonomi'])->name('ekonomi');
// Route::get('/kode-kbli', [MenuController::class, 'kode_kbli'])->name('kode_kbli');
// Route::get('/persil', [MenuController::class, 'persil'])->name('persil');
// Route::get('/poi', [MenuController::class, 'poi'])->name('poi');
// Route::get('/zonasi', [MenuController::class, 'zonasi'])->name('zonasi');

//set data for mobile
Route::post('/setLokasi', function (Request $request) {
    $data = $request->input('lokasi');
    return $request->session()->put('lokasi', $data);
})->name('setLokasi');

Route::post('/setKordinat', function (Request $request) {
    $data = $request->input('kordinat');
    return $request->session()->put('kordinat', $data);
})->name('setKordinat');

Route::post('/setZonasi', function (Request $request) {
    $data = $request->input('zona');
    return $request->session()->put('zona', $data);
})->name('setZonasi');

Route::post('/setPoi', function (Request $request) {
    $data = $request->input('poi');
    return $request->session()->put('poi', $data);
})->name('setPoi');

Route::post('/setEksisting', function (Request $request) {
    $data = $request->input('eksisting');
    return $request->session()->put('eksisting', $data);
})->name('setEksisting');

Route::post('/setKodekbli', function (Request $request) {
    $data = $request->input('kode_kbli');
    return $request->session()->put('kode_kbli', $data);
})->name('setKodekbli');
