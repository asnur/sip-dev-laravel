<?php

use App\Http\Controllers\KBLIPusdatin;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SocialiteController;
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

Route::get('/', function () {
    return view('layout.main');
});

Route::get('/kbli/{subzona}', [KBLIPusdatin::class, 'kegiatan']);
Route::get('/kbli/{subzona}/{kegiatan}', [KBLIPusdatin::class, 'skala']);
Route::get('/kbli/{subzona}/{kegiatan}/{skala}', [KBLIPusdatin::class, 'kewenangan']);

//For PDF Fitur
Route::post('/setKelurahan/{kelurahan}', [PDFController::class, 'setKelurahan']);
Route::post('/savePDF', [PDFController::class, 'savePDF']);

Auth::routes();


//For Login Google
Route::get('/chat/auth/redirect', [SocialiteController::class, 'redirectToProvider'])->name('login-google');
Route::get('/chat/auth/callback', [SocialiteController::class, 'handleProviderCallback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
