<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Article;
use App\Models\Category;
use App\Models\Imunisasi;
use App\Models\RekamMedis;
use App\Models\RiwayatRekomendasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LandingpageController extends Controller
{
    public function index()
    {

        $articles = Article::all();
        return view('welcome', compact('articles'));
    }
   
//     public function simpanRekomendasi($rekomendasi, $kalori)
// {
//     // Hitung kategori berdasarkan kalori
//     $kategori = 'rendah';
//     if ($kalori > 200 && $kalori <= 300) {
//         $kategori = 'sedang';
//     } elseif ($kalori > 300) {
//         $kategori = 'tinggi';
//     }

//     // Simpan ke dalam database
//     RiwayatRekomendasi::create([
//         'rekomendasi' => json_encode($rekomendasi),
//         'kalori' => $kalori,
//         'kategori_kalori' => $kategori,
//         'created_at' => now(),
//     ]);
// }

public function history()
{
    // Ambil data dari tabel RiwayatRekomendasi
    $riwayatRekomendasi = RiwayatRekomendasi::where('orang_tua_id', Auth::user()->orangTua->id)->get();

    $dataKategori = [];
    $labels = [];

    foreach ($riwayatRekomendasi as $rekomendasi) {
        $tanggal = $rekomendasi->created_at->format('Y-m-d');
        $labels[] = $tanggal;
        if ($rekomendasi->kalori < 200) {
            $dataKategori[] = 1 ; // rendah
        } elseif ($rekomendasi->kalori >= 200 && $rekomendasi->kalori <= 400) {
            $dataKategori[] = 2; // sedang
        } else {
            $dataKategori[] = 3; // tinggi
        }
    }

    // Siapkan data untuk chart
    $chartData = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Kategori Kalori',
                'data' => $dataKategori,
                'borderColor' => '#ff4500',
                'fill' => false,
                'tension' => 0.4,
            ]
        ]
    ];
    

    // Kirim data ke view
    return view('history', compact('chartData', 'riwayatRekomendasi'));
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
            // 'golongan_darah' => 'required|string|max:5',
            'berat_lahir' => 'required|numeric',
            'tinggi_lahir' => 'required|numeric',
            // 'lingkar_kepala_lahir' => 'required|numeric',
            'anak_ke' => 'required|integer',
            // 'kondisi_kesehatan' => 'required|string',
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
            // 'golongan_darah' => 'required|string|max:10',
            'berat_lahir' => 'required|numeric',
            'tinggi_lahir' => 'required|numeric',
            // 'lingkar_kepala_lahir' => 'required|numeric',
            'anak_ke' => 'required|integer',
            // 'kondisi_kesehatan' => 'required|string',
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
    public function jadwalImunisasi()
    {
        $imunisasi = Imunisasi::all();
        return view('jadwal-imunisasi.index', compact('imunisasi'));
    }

    public function riwayatRekamMedis()
    {

        $orangTuaId = Auth::user()->orangTua->id;
        $rekamMedis = RekamMedis::where('orang_tua_id', $orangTuaId)->get();
        foreach ($rekamMedis as $item) {
            $item->imunisasi = is_string($item->imunisasi) ? json_decode($item->imunisasi, true) : [];
            $item->riwayat_penyakit = is_string($item->riwayat_penyakit) ? json_decode($item->riwayat_penyakit, true) : [];
            $item->alergi = is_string($item->alergi) ? json_decode($item->alergi, true) : [];
        }
        return view('riwayat-rekam-medis.index', compact('rekamMedis'));
    }
}