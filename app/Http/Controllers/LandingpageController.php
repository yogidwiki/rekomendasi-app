<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingpageController extends Controller
{
    public function index()
    {

        $articles = Article::all();
        return view('welcome', compact('articles'));
    }
    public function about()
    {
        return view('landingpage.about',);
    }
    public function artikel()
    {
        $categories = Category::all();
        $articles = Article::orderBy('created_at', 'desc')
        ->paginate(4);;
        return view('landingpage.artikel',compact('articles','categories'));
    }
  
   


    public function detailArtikel($id)
{
    $artikel = Article::findOrFail($id);
    $articles = Article::latest()->paginate(4);
    return view('landingpage.detail-artikel', compact('artikel','articles'));
}
    

    public function search(Request $request)
    {
        $query = $request->input('query');
        $articles = [];
    
        if ($query) {
            $articles = Article::where('title', 'LIKE', '%' . $query . '%')->get();
        }
    
        return view('landingpage.search-result', compact('articles'));
    }

    public function detailKategori($id)
{
    $categories = Category::all();
    $category = Category::findOrFail($id);
    $articles = Article::where('category_id', $category->id)->get();

    return view('landingpage.detail-kategori', compact('articles', 'category','categories'));
}

}
