<?php

namespace App\Http\Controllers;

use App\Models\Question;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return view('question.index', compact('questions'));

        
    }


    public function nextQuestion($id)
    {
        $nextQuestion = Question::where('id', '>', $id)->first(); // Mengambil pertanyaan berikutnya berdasarkan ID saat ini

        return response()->json($nextQuestion);
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
        Question::create([
            'judul' => $request->input('judul'),
            'konten' => $request->input('konten'),
        ]);

        return redirect()->route('question.index')->with('success', 'Berhasil menambahkan Question');
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
    public function update(Request $request, $id) {
        $question = Question::find($id);
        $question->update([
            'judul' => $request->input('judul'),
            'konten' => $request->input('konten'),
        ]);

        return redirect()->route('question.index')->with('success', 'Berhasil menambahkan Question');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('question.index')->with('success', 'Berhasil hapus user');
    }


}
