<?php

namespace App\Http\Controllers;
use App\Models\Question;

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
<<<<<<< HEAD
    {
        $categories_discussion = CategoryDiscussion::all();
    $discussions = Discussion::orderBy('created_at', 'desc')
                             ->paginate(4);

    return view('landingpage.diskusi', compact('categories_discussion', 'discussions'));
    }


    public function detailArtikel()
>>>>>>> 69bc74ee161128fd32e84b8d8da6c0d996cfc05f
    {
        return view('landingpage.quiz-one');
    }
    public function pageTest()
    {
        $question = Question::all(); // Mengambil pertanyaan pertama


        return view('landingpage.page-test', compact('question'));
    }
}
