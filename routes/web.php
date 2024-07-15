<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\LandingpageController;




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
Route::get('/detail-artikel', [LandingpageController::class, 'detailArtikel'])->name('detail-artikel');
Route::get('/detail-kategori/{id}', [LandingPageController::class, 'detailKategori'])->name('detail-kategori');



Route::get('/artikel/{id}', [LandingpageController::class,'detailArtikel'])->name('detail.artikel');
Route::get('/search', [LandingPageController::class, 'search'])->name('article.search');




Route::group(['middleware' => 'admin'], function () {
    Route::resource('users', UserController::class);
    Route::resource('articles',ArticleController::class);
    Route::post('users/{id}/reset-password', [UserController::class, 'resetPassword'])->name('reset-password');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('categories', CategoryController::class);
    

});


Auth::routes();
