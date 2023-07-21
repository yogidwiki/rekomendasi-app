<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function about(){
        return view('landingpage.about');
    }
    public function artikel(){
        return view('landingpage.artikel');
    }
    public function test(){
        return view('landingpage.test');
    }
    public function diskusi(){
        return view('landingpage.diskusi');
    }
    public function detailArtikel(){
        return view('landingpage.detail-artikel');
    }
}
