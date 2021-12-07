<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;


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

Route::post('/getresolustion', function () {
});

Route::get('/lokasi', [MenuController::class, 'lokasi'])->name('lokasi');
Route::get('/ekonomi', [MenuController::class, 'ekonomi'])->name('ekonomi');
Route::get('/kode-kbli', [MenuController::class, 'kode_kbli'])->name('kode_kbli');
Route::get('/persil', [MenuController::class, 'persil'])->name('persil');
Route::get('/poi', [MenuController::class, 'poi'])->name('poi');
Route::get('/zonasi', [MenuController::class, 'zonasi'])->name('zonasi');
