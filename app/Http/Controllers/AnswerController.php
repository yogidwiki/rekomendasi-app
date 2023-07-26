<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth; 
use App\Models\Question;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $ratings = $request->input('score');

        // Menghitung jumlah nilai dari array 'rating'
        $totalRating = array_sum($ratings);
            Answer::create([
                'user_id' => Auth::user()->id ,
                'score' => $totalRating,
            ]);

            $userAnswers = Answer::where('user_id', Auth::user()->id)->get();
            $Questions = Question::count();
            $totalQuestions = $Questions*4;

            $minimumScore = 0.3 * $totalQuestions;
            $maxNetralScore =  0.6 * $totalQuestions;
    
            return view('landingpage.result')->with([
                'success' => 'Hasil Tes kamu',
                'userAnswers' => $userAnswers,
                'totalRating' => $totalRating,
                'totalQuestions' => $totalQuestions,
                'minimumScore' => $minimumScore,
                'maxNetralScore' => $maxNetralScore,
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
