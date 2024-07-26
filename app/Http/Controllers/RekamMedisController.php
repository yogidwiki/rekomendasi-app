<?php

namespace App\Http\Controllers;

use App\Models\Anak;
use App\Models\OrangTua;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekamMedis = RekamMedis::with(['orangTua', 'anak'])->get();
        foreach ($rekamMedis as $item) {
            $item->imunisasi = is_string($item->imunisasi) ? json_decode($item->imunisasi, true) : [];
            $item->riwayat_penyakit = is_string($item->riwayat_penyakit) ? json_decode($item->riwayat_penyakit, true) : [];
            $item->alergi = is_string($item->alergi) ? json_decode($item->alergi, true) : [];
        }
        $orangTua = OrangTua::all();
        $anak = Anak::all();
        return view('rekam_medis.index', compact('rekamMedis', 'orangTua', 'anak'));
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
        $request->validate([
            'orang_tua_id' => 'required|exists:orang_tua,id',
            'anak_id' => 'required|exists:anak,id',
            'imunisasi' => 'required|array',
            'tanggal_imunisasi' => 'required|array',
            'riwayat_penyakit' => 'required|array',
            'alergi' => 'required|array',
        ]);
    
        RekamMedis::create([
            'orang_tua_id' => $request->orang_tua_id,
            'anak_id' => $request->anak_id,
            'imunisasi' => json_encode(array_map(function($imunisasi, $tanggal) {
                return ['nama' => $imunisasi, 'tanggal' => $tanggal];
            }, $request->imunisasi, $request->tanggal_imunisasi)),
            'riwayat_penyakit' => json_encode($request->riwayat_penyakit),
            'alergi' => json_encode($request->alergi),
        ]);
    
        return redirect()->back()->with('success', 'Rekam Medis berhasil ditambahkan.');
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
        $request->validate([
            'orang_tua_id' => 'required|exists:orang_tua,id',
            'anak_id' => 'required|exists:anak,id',
            'imunisasi.*' => 'nullable|string',
            'riwayat_penyakit.*' => 'nullable|string',
            'alergi.*' => 'nullable|string',
        ]);

        $rekamMedis = RekamMedis::findOrFail($id);

        $rekamMedis->orang_tua_id = $request->input('orang_tua_id');
        $rekamMedis->anak_id = $request->input('anak_id');
        
        $rekamMedis->imunisasi = $request->input('imunisasi', []);
        $rekamMedis->riwayat_penyakit = $request->input('riwayat_penyakit', []);
        $rekamMedis->alergi = $request->input('alergi', []);

        $rekamMedis->save();

        return redirect()->route('rekam-medis.index')->with('success', 'Rekam medis berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $rekamMedis->delete();

        return redirect()->route('rekam-medis.index')->with('success', 'Rekam medis berhasil dihapus.');
    }

    public function getAnakByOrangTua($orang_tua_id)
    {
        $anak = Anak::where('orang_tua_id', $orang_tua_id)->get();
        return response()->json($anak);
    }

}
