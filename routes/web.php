<?php

use App\Http\Controllers\M2Controller;
use App\Http\Controllers\M4Controller;
use App\Http\Controllers\CVController;
use App\Http\Controllers\M5Controller;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentcarController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SewaController;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\password;

Route::get('m2/lat1', [M2Controller::class, 'lat1']);
Route::get('m2/lat2', [M2Controller::class, 'lat2']);
Route::get('m2/lat3', [M2Controller::class, 'lat3']);


Route::get('m4/identitas', [M4Controller::class, 'm4_identitas'])->name('m4.identitas');
Route::get('m4/pendidikan', [M4Controller::class, 'm4_pendidikan'])->name('m4.pendidikan');
Route::get('m4/skill', [M4Controller::class, 'm4_skill'])->name('m4.skill');

Route::get('/m5/lat1', [M5Controller::class, 'lat1']);

Route::get('m5/lat2', [M5Controller::class, 'lat2']);
Route::post('m5/lat2_action', [M5Controller::class, 'lat2Action'])->name('m5.lat2.action');

Route::get('m5/tabung', [M5Controller::class, 'tabung']);
Route::post('m5/tabung_action', [M5Controller::class, 'tabungAction'])->name('m5.tabung.action');

Route::middleware('auth')->group(function () {

    Route::resource('sewa', SewaController::class);
    Route::get('password', [UserController::class, 'password'])->name('user.password');
    Route::post('password', [UserController::class, 'passwordAction'])->name('user.password.action');
    Route::resource('sewa', SewaController::class);
    Route::resource('rentcar', RentcarController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('user', UserController::class);
    Route::get('logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('userexport', [UserController::class, 'userexport'])->name('user.userexport');
    Route::get('rentcarexport', [RentcarController::class, 'rentcarexport'])->name('rentcar.rentcarexport');
    Route::get('sewaexport', [SewaController::class, 'sewaexport'])->name('sewa.sewaexport');
    Route::get('kategoriexport', [KategoriController::class, 'kategoriexport'])->name('kategori.kategoriexport');
});

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'loginAction'])->name('user.login.action');

Route::get('identitas', [CVController::class, 'identitas'])->name('identitas');
Route::get('pendidikan', [CVController::class, 'pendidikan'])->name('pendidikan');
Route::get('skill', [CVController::class, 'skill'])->name('skill');

//Route::view('/home/', 'home');

//Route::get('/awal', function(){
    //$url = route('kontak');
    //echo '<a href="'.$url . '">Klik di sini untuk ke halaman kontak</a>';
//});

//Route::get('/kontak', function(){
    //echo 'hello, ini adalah halaman kontak yang dibuka dari link route awal';

//})->name('kontak');

//Route::get('/detail/{nama}/{alamat?}', function($nama, $alamat=''){
    //echo 'hello, nama saya adalah'.$nama . ',saya tinggal di'. $alamat;
//});

//Route::get('/tampil/{nama}', function($nama){
    //echo 'hello, nama saya adalah'.$nama;
//});

//Route::get('/greeting', function(){
    //echo 'hello, saya sudah bisa route laravel';
//});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
    //return view('welcome');
//});
