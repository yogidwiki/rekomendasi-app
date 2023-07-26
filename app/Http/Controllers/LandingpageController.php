<?php

namespace App\Http\Controllers;
use App\Models\Question;

use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        return view('welcome');
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
        return view('landingpage.diskusi');
    }
    public function quizOne()
    {
        return view('landingpage.quiz-one');
    }
    public function pageTest()
    {
        $question = Question::all(); // Mengambil pertanyaan pertama


        return view('landingpage.page-test', compact('question'));
    }
}
