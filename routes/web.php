<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsahaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KBLIPusdatin;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\TrackingController;
use App\Models\User;
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

Route::get('/kbli/{subzona}', [KBLIPusdatin::class, 'kegiatan']);
Route::get('/kbli/{subzona}/{kegiatan}', [KBLIPusdatin::class, 'skala']);
Route::get('/kbli/{subzona}/{kegiatan}/{skala}', [KBLIPusdatin::class, 'kewenangan']);


// login dengan google
Route::get('/auth/redirect', [SocialiteController::class, 'redirectToProvider'])->name('login-google');
Route::get('/auth/callback', [SocialiteController::class, 'handleProviderCallback']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function (Request $request) {
    return view('layout.main');
});

// Route::get('/migrasi', function () {
//     $data = array(
//         1 => array('Nama' => 'Adhamaski Pangeran', 'Email' => 'adhamaskipangeran@Gmail.com'),
//         2 => array('Nama' => 'Agus Taruna', 'Email' => 'tarunaagus2011@gmail.com'),
//         3 => array('Nama' => 'Ahmad Rosdianto', 'Email' => 'rosdianto07@gmail.com'),
//         4 => array('Nama' => 'Arham', 'Email' => 'alansembilanpuluh90@gmail.com'),
//         5 => array('Nama' => 'Daniel Harvey Tulis', 'Email' => 'danieltulis1000@gmail.com'),
//         6 => array('Nama' => 'Dewinta Cahya Mardlatilla', 'Email' => 'dewintacaca@gmail.com'),
//         7 => array('Nama' => 'Dhimas Ali Fadhilah', 'Email' => 'dhimasalifadhilah@gmail.com'),
//         8 => array('Nama' => 'Diah Ayu Retno Wati', 'Email' => 'diaharw13@gmail.com'),
//         9 => array('Nama' => 'Dikdik Suratman', 'Email' => 'dikdik@myself.com'),
//         10 => array('Nama' => 'Endang Sanjaya', 'Email' => 'endangsanjaya2012@gmail.com'),
//         11 => array('Nama' => '', 'Email' => ''),
//         12 => array('Nama' => 'Faiz Akmal Fadhlur Rahman', 'Email' => 'faiz.akmalfr26@gmail.com'),
//         13 => array('Nama' => 'Fidiyati', 'Email' => 'fidi.azzahra@gmail.com'),
//         14 => array('Nama' => 'Handrianus Tm Wolo', 'Email' => 'handrianus.wolo@gmail.com'),
//         15 => array('Nama' => 'Hanif Ibnu Fajar', 'Email' => 'hanif.fajar.id@gmail.com'),
//         16 => array('Nama' => 'Harry Akbar Luhulima', 'Email' => 'harryluhulima13@gmail.com'),
//         17 => array('Nama' => 'Ipung Jatti Renanda', 'Email' => 'ipung.jatti@gmail.com'),
//         18 => array('Nama' => 'Kartika Puspa Dewi', 'Email' => 'kartikapuspadewi23@gmail.com'),
//         19 => array('Nama' => 'Kemri Purba', 'Email' => 'kemripurba@gmail.com'),
//         20 => array('Nama' => 'Lukman Arief Gunawan', 'Email' => 'lukman066@gmail.com'),
//         21 => array('Nama' => 'M. Raimi Said', 'Email' => 'raimisaid@gmail.com'),
//         22 => array('Nama' => 'M. Sulhi Purnama', 'Email' => 'sulhipurnama@gmail.com'),
//         23 => array('Nama' => 'Muhamad Nur Awali', 'Email' => 'dimasnoorawali@gmail.com'),
//         24 => array('Nama' => 'Muhammad Amri Cahyo Gumilar', 'Email' => 'amri.cahyo@gmail.com'),
//         25 => array('Nama' => 'Muhammad Beri Ferari', 'Email' => 'mberiferari@gmail.com'),
//         26 => array('Nama' => 'Muhammad Deni Nusantara', 'Email' => 'deni.nusantara46@yahoo.com'),
//         27 => array('Nama' => 'Ponco Hadi Saputra', 'Email' => 'poncohadisaputra@gmail.com'),
//         28 => array('Nama' => 'Rachmad Noviandri', 'Email' => 'rachmadnoviandri@gmail.com'),
//         29 => array('Nama' => 'Riska Phillia Br Ginting', 'Email' => 'riskaphillia08@gmail.com'),
//         30 => array('Nama' => 'Rizal Budiawan', 'Email' => 'rizalbud1031@yahoo.com'),
//         31 => array('Nama' => 'Rizky Septina Kusuma Dewi', 'Email' => 'rizkyatwork@gmail.com'),
//         32 => array('Nama' => 'Roma Anggiadini', 'Email' => 'romaanggiadini15@gmail.com'),
//         33 => array('Nama' => 'Samuel Putra Bahari', 'Email' => 'samuel.bahari98@gmail.com'),
//         34 => array('Nama' => 'Shofi Shibghatillah Shulhiddar', 'Email' => 'opijcd@gmail.com'),
//         35 => array('Nama' => 'Silka Azzahra Shafa Aulia', 'Email' => 'silkaaulia@gmail.com'),
//         36 => array('Nama' => 'Sobah Alhaddad', 'Email' => 'soba2806@gmail.com'),
//         37 => array('Nama' => 'Tegar Bonaventura Belo Ola', 'Email' => 'tegarbeloola@gmail.com'),
//         38 => array('Nama' => 'Thirdo Setyo Arif', 'Email' => 'thirdosetyo.a@gmail.com'),
//         39 => array('Nama' => 'Wahyu Maulana Mustafa', 'Email' => 'wahyumustafa78@gmail.com'),
//         40 => array('Nama' => 'Yoga Pratama Geofanny', 'Email' => 'yogageofanny18@gmail.com'),
//         41 => array('Nama' => 'Yohanes Kurniawan Santosa', 'Email' => 'yohaneskurniawans.33@gmail.com'),
//     );

//     foreach ($data as $d) {
//         $user = User::create([
//             'name' => $d['Nama'],
//             'email' => $d['Email']
//         ]);

//         $user->assignRole('surveyer');
//     }
// });

Route::group(['middleware' => ['role:surveyer']], function () {
    Route::resource('/ajib', SurveyController::class);
    Route::post('/tracking', [TrackingController::class, 'index']);
    Route::delete('/delete-survey', [SurveyController::class, 'destroy'])->name('delete-survey');
});
