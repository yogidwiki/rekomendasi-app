<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('testimonial.index', compact('testimonials'));
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
        if (!Auth::check()) {
            return redirect()->route('login')
                             ->with('warning', 'Anda harus login terlebih dahulu untuk mengirim testimonial.');
        }
        $validatedData = $request->validate([
            'ulasan' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        $validatedData['user_id'] =  Auth::user()->id;

        Testimonial::create($validatedData);

        return redirect()->back()->with('success', 'Berhasil menambahkan Testimoni');
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
        $testimonials = Testimonial::findOrFail($id);
        $testimonials->delete();

        return redirect()->route('testimonials.index')->with('success', 'Berhasil hapus Tes$testimonials');
    }
}
