<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsahaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KBLIPusdatin;
use App\Http\Controllers\SocialiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function (Request $request) {
//     $status = $request->session()->get('cek-login');
//     if ($status == 'login') {
//         echo "<script>window.close();</script>";
//     }
//     return view('layout.main');
// });

Route::get('/kbli/{subzona}', [KBLIPusdatin::class, 'kegiatan']);
Route::get('/kbli/{subzona}/{kegiatan}', [KBLIPusdatin::class, 'skala']);
Route::get('/kbli/{subzona}/{kegiatan}/{skala}', [KBLIPusdatin::class, 'kewenangan']);


// login dengan google
Route::get('/auth/redirect', [SocialiteController::class, 'redirectToProvider'])->name('login-google');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleProviderCallback']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function (Request $request) {
    return view('layout.main');
});

// Route::get('/tambah_ajib', [App\Http\Controllers\UsahaController::class, 'create'])->name('tambah_ajib');

// 1
// Route::post('/tambah_ajib', [App\Http\Controllers\UsahaController::class, 'store'])->name('tambah_ajib');

// 2
Route::resource('/ajib', UsahaController::class);



Route::get('admin', function () {
    return "Halaman Admin";
})->middleware('role:admin')->name('admin.page');

Route::get('user', function () {
    return view('layout.main');
})->middleware('role:user')->name('user.page');
