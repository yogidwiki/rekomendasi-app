<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\CategoryDiscussion;
use Illuminate\Support\Facades\DB;

class LandingpageController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('welcome', compact('testimonials'));
    }
    public function about()
    {
        return view('landingpage.about');
    }
    public function artikel()
    {
        return view('landingpage.artikel');
    }
    public function test()
    {
        return view('landingpage.test');
    }
    public function diskusi()
    {
        $categories_discussion = CategoryDiscussion::all();
        $discussions = Discussion::all();

        return view('landingpage.diskusi', compact('categories_discussion', 'discussions'));
    }


    public function detailArtikel()
    {
        return view('landingpage.detail-artikel');
    }
    public function detailKategori()
    {
        return view('landingpage.detail-kategori');
    }
}
