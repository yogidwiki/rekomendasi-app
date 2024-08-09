<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\RulesController;

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


Route::get('/', [LandingpageController::class, 'index'])->name('welcome');
Route::get('/about', [LandingpageController::class, 'about'])->name('about');
Route::get('/artikel', [LandingpageController::class, 'artikel'])->name('artikel');
Route::get('/history', [LandingpageController::class, 'history'])->name('history');
Route::get('/detail-artikel', [LandingpageController::class, 'detailArtikel'])->name('detail-artikel');
Route::get('/detail-kategori/{id}', [LandingPageController::class, 'detailKategori'])->name('detail-kategori');

Route::get('/anak', [LandingpageController::class, 'anak'])->name('anak');
Route::post('tambah/anak', [LandingpageController::class, 'tambahAnak'])->name('tambah.anak');
Route::put('update/anak/{id}', [LandingpageController::class, 'updateAnak'])->name('update.anak');
Route::post('hapus/anak/{id}', [LandingpageController::class, 'hapusAnak'])->name('hapus.anak');
Route::get('/cari-rekomendasi', [RekomendasiController::class, 'cariRekomendasi']);
Route::get('/jadwal-imunisasi', [LandingpageController::class, 'jadwalImunisasi'])->name('jadwal-imunisasi');
Route::get('/riwayat-rekam-medis', [LandingpageController::class, 'riwayatRekamMedis'])->name('riwayat-rekam-medis');

Route::get('/artikel/{id}', [LandingpageController::class,'detailArtikel'])->name('detail.artikel');
Route::get('/search', [LandingPageController::class, 'search'])->name('article.search');

Route::get('/anak/{id}', [RekomendasiController::class, 'getAnakById']);
Route::post('/notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');




Route::group(['middleware' => 'admin'], function () {
    Route::resource('users', UserController::class);
    Route::resource('articles',ArticleController::class);
    Route::post('users/{id}/reset-password', [UserController::class, 'resetPassword'])->name('reset-password');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('categories', CategoryController::class);
    Route::resource('makanan', MakananController::class);
    Route::resource('imunisasi', ImunisasiController::class);
    Route::resource('rules', RulesController::class);
    Route::resource('rekam-medis', RekamMedisController::class);
    Route::get('/anakshow/{orang_tua_id}', [RekamMedisController::class, 'getAnakByOrangTua'])->name('anak.by.orang_tua');

    Route::post('rekam-medis/createOrUpdate', [RekamMedisController::class, 'createOrUpdate'])->name('rekam-medis.createOrUpdate');
    

});

route::middleware('auth')->group(function () {
    
    Route::resource('rekomendasi', RekomendasiController::class);

});


Auth::routes();
