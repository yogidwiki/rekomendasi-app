<?php

namespace App\Http\Controllers;
use App\Models\Member;

use App\Models\Article;
use App\Models\Category;
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
        $articles = Article::all();
        return view('welcome', compact('testimonials','articles'));
    }
    public function about()
    {
        $members = Member::all();
        return view('landingpage.about', compact('members'));
    }
    public function artikel()
    {
        $categories = Category::all();
        $articles = Article::orderBy('created_at', 'desc')
        ->paginate(4);;
        return view('landingpage.artikel',compact('articles','categories'));
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


    public function detailArtikel($id)
{
    $artikel = Article::findOrFail($id);
    return view('landingpage.detail-artikel', compact('artikel'));
}
    public function pageTest()
    {
        $question = Question::all(); // Mengambil pertanyaan pertama


        return view('landingpage.page-test', compact('question'));
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
