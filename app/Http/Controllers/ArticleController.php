<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('category')->get();
        $categories = Category::all();
        return view('article.index', compact('articles','categories'));
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
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'image' => 'File :attribute harus berupa gambar.',
            'mimes' => 'File :attribute harus memiliki format PNG, JPG, atau JPEG.',
            'min' => 'Kolom :attribute harus memiliki nilai minimal :min.',
        ];
    
        $data = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'publisher' => 'required',
            'author' => 'required',
            'category_id' => 'required',
            'year' => 'required',
            'description' => 'required',
        ], $messages);
    
        if ($image = $request->file('image')) {
            $path = 'public/posts';
            $namaGambar = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $namaGambar);
            $data['image'] = $namaGambar;
        }
    
        $article = Article::create($data);
    
        return redirect()->route('articles.index')->with('success', 'Data Berhasil diTambah!');
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
    public function update(Request $request, $id)
{
    $messages = [
        'required' => 'Kolom :attribute harus diisi.',
        'image' => 'File :attribute harus berupa gambar.',
        'mimes' => 'File :attribute harus memiliki format PNG, JPG, atau JPEG.',
    ];

    $data = $request->validate([
        'title' => 'required',
        'image' => 'nullable|image|mimes:png,jpg,jpeg',
        'publisher' => 'required',
        'author' => 'required',
        'category_id' => 'required',
        'year' => 'required',
        'description' => 'required',
    ], $messages);

    $article = Article::findOrFail($id);
    

    if ($image = $request->file('image')) {
        $path = 'public/posts';

        // Menghapus gambar lama jika ada
        if ($article->image) {
            Storage::delete($path . '/' . $article->image);
        }

        $namaGambar = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($path, $namaGambar);
        $data['image'] = $namaGambar;
    }

    
    $article->update($data);

    return redirect()->route('articles.index')->with('success', 'Data berhasil diupdate!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);

    // Menghapus file gambar jika ada
    if ($article->image) {
        $path = 'public/posts';
        Storage::delete($path . '/' . $article->image);
    }
    

    $article->delete();

    return redirect()->route('articles.index')->with('success', 'Berhasil hapus buku');
    }
}
