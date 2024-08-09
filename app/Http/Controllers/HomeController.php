<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrangTua;
use App\Models\Anak;
use App\Models\Imunisasi;
use App\Models\RekamMedis;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahOrangTua = OrangTua::count();
        $jumlahAnak = Anak::count();
        $jumlahImunisasi = Imunisasi::count(); 
        $jumlahRekamMedis = RekamMedis::count();
        $jumlahArtikel = Article::count();

        return view('home', compact('jumlahOrangTua', 'jumlahAnak', 'jumlahImunisasi', 'jumlahRekamMedis', 'jumlahArtikel'));
    }
}
