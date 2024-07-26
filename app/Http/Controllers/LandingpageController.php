<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Article;
use App\Models\Category;
use App\Models\RiwayatRekomendasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LandingpageController extends Controller
{
    public function index()
    {

        $articles = Article::all();
        return view('welcome', compact('articles'));
    }

    public function history()
    {
        $riwayatRekomendasi = RiwayatRekomendasi::where('orang_tua_id', Auth::user()->orangTua->id)->get();

        return view('history', compact('riwayatRekomendasi'));
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
        return view('landingpage.artikel', compact('articles', 'categories'));
    }




    public function detailArtikel($id)
    {
        $artikel = Article::findOrFail($id);
        $articles = Article::latest()->paginate(4);
        return view('landingpage.detail-artikel', compact('artikel', 'articles'));
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

        return view('landingpage.detail-kategori', compact('articles', 'category', 'categories'));
    }
    public function anak()
    {
        $anak = Anak::where('orang_tua_id', auth()->user()->orangTua->id)->get();
        return view('landingpage.anak', compact('anak'));
    }

    public function tambahAnak(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'golongan_darah' => 'required|string|max:5',
            'berat_lahir' => 'required|numeric',
            'tinggi_lahir' => 'required|numeric',
            'lingkar_kepala_lahir' => 'required|numeric',
            'anak_ke' => 'required|integer',
            'kondisi_kesehatan' => 'required|string',
        ]);

        $request->merge(['orang_tua_id' => auth()->user()->orangTua->id]);

        Anak::create($request->all());

        return redirect()->back()->with('success', 'Data anak berhasil ditambahkan!');
    }
    public function updateAnak(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'golongan_darah' => 'required|string|max:10',
            'berat_lahir' => 'required|numeric',
            'tinggi_lahir' => 'required|numeric',
            'lingkar_kepala_lahir' => 'required|numeric',
            'anak_ke' => 'required|integer',
            'kondisi_kesehatan' => 'required|string',
        ]);

        $anak = Anak::findOrFail($id);
        $anak->update($request->all());
        return redirect()->back()->with('success', 'Anak berhasil diperbarui!');
    }

    public function hapusAnak($id)
    {
        $anak = Anak::findOrFail($id);
        $anak->delete();
        return redirect()->back()->with('success', 'Anak berhasil dihapus!');
    }
}
