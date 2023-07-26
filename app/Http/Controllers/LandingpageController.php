<?php

namespace App\Http\Controllers;
use App\Models\Question;

use App\Models\Member;
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
        $members = Member::all();
        return view('landingpage.about', compact('members'));
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
    $discussions = Discussion::orderBy('created_at', 'desc')
                             ->paginate(4);

    return view('landingpage.diskusi', compact('categories_discussion', 'discussions'));
    }


    public function detailArtikel()
    {
        return view('landingpage.quiz-one');
    }
    public function pageTest()
    {
        $question = Question::all(); // Mengambil pertanyaan pertama


        return view('landingpage.page-test', compact('question'));
    }
}
