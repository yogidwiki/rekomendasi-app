<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        $makanans = Makanan::all();
        return view('makanan.index', compact('makanans'));
    }

    public function create()
    {
        return view('makanan.create');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'nama_makanan' => 'required',
            'resep' => 'required',
            'bahan' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'kalori' => 'required|integer',
        ]);

        $data = $request->all();
        if ($image = $request->file('gambar')) {
            $path = 'makanan-images';
            $namaGambar = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        Makanan::create($data);
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil ditambahkan!');
    }

    public function edit(Makanan $makanan)
    {
        return view('makanan.edit', compact('makanan'));
    }

    public function update(Request $request, Makanan $makanan)
    {
        $request->validate([
            'nama_makanan' => 'required',
            'resep' => 'required',
            'bahan' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'kalori' => 'required|integer',
        ]);

        $data = $request->all();
        if ($image = $request->file('gambar')) {
            $path = 'makanan-images';
            $namaGambar = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($path, $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        $makanan->update($data);
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil diperbarui!');
    }

    public function destroy(Makanan $makanan)
    {
        $makanan->delete();
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil dihapus!');
    }
}
