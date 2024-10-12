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
use ArielMejiaDev\LarapexCharts\LarapexChart;

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

    $dataRendah = [];
    $dataSedang = [];
    $dataTinggi = [];
    $labels = [];

    foreach ($riwayatRekomendasi as $rekomendasi) {
        $tanggal = $rekomendasi->created_at->format('Y-m-d');
        $labels[] = $tanggal;

        // Initialize counts for each category
        $rendah = 0;
        $sedang = 0;
        $tinggi = 0;

        // Decode rekomendasi if it is a JSON string
        $rekomendasiMakanan = is_string($rekomendasi->rekomendasi) 
            ? json_decode($rekomendasi->rekomendasi, true) 
            : $rekomendasi->rekomendasi;

        foreach ($rekomendasiMakanan as $item) {
            $kalori = $item['kalori'] ?? 0;

            // Categorize based on caloric content
            if ($kalori < 300) {
                $rendah++;
            } elseif ($kalori >= 300 && $kalori <= 400) {
                $sedang++;
            } else {
                $tinggi++;
            }
        }

        // Store the counts for each category
        $dataRendah[] = $rendah;
        $dataSedang[] = $sedang;
        $dataTinggi[] = $tinggi;
    }

    // Combine data into a single dataset in the desired order
    $dataChart = [];
    foreach ($dataRendah as $index => $value) {
        $dataChart[] = [
            'label' => $labels[$index],
            'Rendah' => $value,
            'Sedang' => $dataSedang[$index],
            'Tinggi' => $dataTinggi[$index],
        ];
    }           

    // Create the line chart
    $chart = (new LarapexChart)->lineChart()
        ->setTitle('Perkembangan Balita')
        ->setXAxis($labels)
        ->addData('Rendah', array_column($dataChart, 'Rendah'))
        ->addData('Sedang', array_column($dataChart, 'Sedang'))
        ->addData('Tinggi', array_column($dataChart, 'Tinggi'))
        ->setColors(['#00bfff', '#ffa500', '#ff4500']);

    return view('history', compact('riwayatRekomendasi', 'chart'));
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
