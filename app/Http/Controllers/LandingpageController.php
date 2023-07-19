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
}
