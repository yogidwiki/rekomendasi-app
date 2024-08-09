<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\Makanan;
use App\Models\RiwayatRekomendasi;
use App\Models\RekamMedis;
use App\Models\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekomendasiController extends Controller
{
    public function index()
    {
        $anak = Anak::where('orang_tua_id', auth()->user()->orangTua->id)->get();
        return view('rekomendasi.index', compact('anak'));
    }

    public function getAnakById($id)
    {
        $anak = Anak::findOrFail($id);
        return response()->json($anak);
    }

    public function cariRekomendasi(Request $request)
    {
        $anakId = $request->query('anak_id');
        $beratBadan = $request->query('berat_badan');
        $tinggiBadan = $request->query('tinggi_badan');
        $umur = $request->query('umur');
        $jenisKelamin = $request->query('jenis_kelamin');
        $aktivitasFisik = $request->query('aktivitas_fisik');

        // Ambil data alergi anak dari tabel rekam medis
        $rekamMedis = RekamMedis::where('anak_id', $anakId)->first();
        $alergiAnak = $rekamMedis ? collect(json_decode($rekamMedis->alergi)) : collect([]);

        $fuzzyResults = $this->calculateFuzzy($umur, $beratBadan, $tinggiBadan, $aktivitasFisik, $jenisKelamin);
        $kalori = $this->defuzzification($fuzzyResults);
        $lowerBound = $kalori - 50;
        $upperBound = $kalori + 50;

        $makanan = Makanan::whereBetween('kalori', [$lowerBound, $upperBound])->get();

        $kriteria = [
            'berat_badan' => $beratBadan,
            'tinggi_badan' => $tinggiBadan,
            'umur' => $umur,
            'jenis_kelamin' => $jenisKelamin,
            'aktivitas_fisik' => $aktivitasFisik
        ];

        $rekomendasi = $makanan->map(function ($item) use ($kalori, $alergiAnak) {
            $item->selisih_kalori = abs($item->kalori - $kalori);

            // Periksa bahan makanan terhadap alergi anak
            $bahanKata = preg_split('/\s+/', strtolower($item->bahan));
            $alergiKata = preg_split('/\s+/', strtolower($alergiAnak->implode(' ')));
            $bahanAlergi = collect($bahanKata)->intersect($alergiKata)->unique();

            $item->is_alergi = $bahanAlergi->isNotEmpty();
            $item->bahan_alergi = $bahanAlergi;

            return $item;
        })->sortBy('selisih_kalori')->values()->map(function ($item) {
            return [
                'nama_makanan' => $item->nama_makanan,
                'kalori' => $item->kalori,
                'resep' => $item->resep,
                'bahan' => $item->bahan,
                'gambar' => $item->gambar,
                'is_alergi' => $item->is_alergi,
                'bahan_alergi' => $item->bahan_alergi
            ];
        });

       
        if ($rekomendasi->count() > 0) {
            RiwayatRekomendasi::create([
                'anak_id' => $anakId,
                'orang_tua_id' => Auth::user()->orangTua->id,
                'kriteria' => $kriteria,
                'rekomendasi' => $rekomendasi,
            ]);
        }

        return view('rekomendasi.hasil_rekomendasi', compact('makanan', 'kalori', 'alergiAnak'));
    }




    private function calculateFuzzy($umur, $beratBadan, $tinggiBadan, $aktivitasFisik, $jenisKelamin)
    {
        $umurMembership = $this->fuzzifyUmur($umur);
        $beratMembership = $this->fuzzifyBerat($beratBadan);
        $tinggiMembership = $this->fuzzifyTinggi($tinggiBadan);
        $aktivitasMembership = $this->fuzzifyAktivitas($aktivitasFisik);
        $kelaminMembership = $this->fuzzifyKelamin($jenisKelamin);
        // dd($umurMembership, $beratMembership, $tinggiMembership, $aktivitasMembership, $kelaminMembership);

        $results = $this->applyFuzzyRules($umurMembership, $beratMembership, $tinggiMembership, $aktivitasMembership, $kelaminMembership);

        return $results;
    }

    private function fuzzifyUmur($umur)
    {
        $umur = (int) $umur;

        $balita1 = $umur <= 24 ? 1 : 0;
        $balita2 = ($umur > 24 && $umur <= 36) ? (36 - $umur) / 12 : 0;
        $balita3 = ($umur > 36 && $umur <= 60) ? ($umur - 36) / 24 : 0;

        return [
            '1' => $balita1,
            '2' => $balita2,
            '3' => $balita3
        ];
    }


    private function fuzzifyBerat($beratBadan)
    {
        $ringan = $beratBadan < 10 ? 1 : ($beratBadan <= 15 ? (15 - $beratBadan) / 5 : 0);
        $normal = $beratBadan < 10 ? 0 : ($beratBadan <= 15 ? ($beratBadan - 10) / 10 : ($beratBadan <= 20 ? (20 - $beratBadan) / 5 : 0));
        $berat = $beratBadan <= 15 ? 0 : ($beratBadan <= 20 ? ($beratBadan - 15) / 5 : 1);

        return [
            'Ringan' => $ringan,
            'Normal' => $normal,
            'Berat' => $berat
        ];
    }

    private function fuzzifyTinggi($tinggiBadan)
    {
        $pendek = ($tinggiBadan < 70) ? 0 : (($tinggiBadan <= 90) ? (90 - $tinggiBadan) / (90 - 70) : 0);
        $sedang = ($tinggiBadan >= 80 && $tinggiBadan <= 90) ? ($tinggiBadan - 80) / (90 - 80) : (($tinggiBadan > 90 && $tinggiBadan <= 100) ? (100 - $tinggiBadan) / (100 - 90) : 0);
        $tinggi = ($tinggiBadan >= 90) ? (($tinggiBadan - 90) / (110 - 90)) : 0;

        return [
            'Pendek' => $pendek,
            'Sedang' => $sedang,
            'Tinggi' => $tinggi
        ];
    }




    private function fuzzifyAktivitas($aktivitasFisik)
    {
        return [
            'Rendah' => $aktivitasFisik == 'rendah' ? 1 : 0,
            'Sedang' => $aktivitasFisik == 'sedang' ? 1 : 0,
            'Tinggi' => $aktivitasFisik == 'tinggi' ? 1 : 0
        ];
    }

    private function fuzzifyKelamin($jenisKelamin)
    {
        return [
            'Laki-laki' => $jenisKelamin == 'Laki-laki' ? 1 : 0,
            'Perempuan' => $jenisKelamin == 'Perempuan' ? 1 : 0
        ];
    }
    private function applyFuzzyRules($umurMembership, $beratMembership, $tinggiMembership, $aktivitasMembership, $kelaminMembership)
    {
        $rules = Rule::all();
        $results = [];

        foreach ($rules as $rule) {
            $umurKey = $rule->usia_balita;
            $beratKey = $rule->berat_badan;
            $tinggiKey = $rule->tinggi_badan;
            $aktivitasKey = $rule->aktivitas_fisik;
            $kelaminKey = $rule->jenis_kelamin;

            $umurValue = $umurMembership[$umurKey] ?? 0;
            $beratValue = $beratMembership[$beratKey] ?? 0;
            $tinggiValue = $tinggiMembership[$tinggiKey] ?? 0;
            $aktivitasValue = $aktivitasMembership[$aktivitasKey] ?? 0;
            $kelaminValue = $kelaminMembership[$kelaminKey] ?? 0;

            // Hitung degree dari aturan
            $degree = min(
                $umurValue,
                $beratValue,
                $tinggiValue,
                $aktivitasValue,
                $kelaminValue
            );

            if ($degree > 0) { // Hanya simpan aturan dengan degree > 0
                if (!isset($results[$rule->kalori])) {
                    $results[$rule->kalori] = $degree;
                } else {
                    $results[$rule->kalori] = max($results[$rule->kalori], $degree); // Ambil nilai maksimum
                }
            }
        }
        return $results;
    }

    private function defuzzification($fuzzyResults)
    {
        $numerator = 0;
        $denominator = 0;

        foreach ($fuzzyResults as $kalori => $degree) {
            $numerator += $kalori * $degree;
            $denominator += $degree;
        }

        return $denominator ? $numerator / $denominator : 0;
    }
}
