<?php

namespace App\Http\Controllers;

use App\Models\Imunisasi;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class ImunisasiController extends Controller
{
    public function index()
    {
        $imunisasi = Imunisasi::all();
        return view('imunisasi.index', compact('imunisasi'));
    }

    public function create()
    {
        return view('imunisasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_imunisasi' => 'required',
            'tanggal_imunisasi' => 'required|date',
            'tempat_imunisasi' => 'required',
            'usia_bulan' => 'required|integer',
        ]);

        $imunisasi = Imunisasi::create($request->all());
        $users = User::where('is_admin', false)->get();

        foreach ($users as $user) {
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Reminder Imunisasi',
                'message' => 'Ingat! Jadwal imunisasi untuk ' . $imunisasi->nama_imunisasi . ' pada tanggal ' . $imunisasi->tanggal_imunisasi . ' di ' . $imunisasi->tempat_imunisasi,
            ]);
        }
        return redirect()->route('imunisasi.index')->with('success', 'Jadwal imunisasi berhasil ditambahkan');
    }

    public function edit(Imunisasi $imunisasi)
    {
        return view('imunisasi.edit', compact('imunisasi'));
    }

    public function update(Request $request, Imunisasi $imunisasi)
    {
        $request->validate([
            'nama_imunisasi' => 'required',
            'tanggal_imunisasi' => 'required|date',
            'tempat_imunisasi' => 'required',
            'usia_bulan' => 'required|integer',
        ]);

        $imunisasi->update($request->all());
        return redirect()->route('imunisasi.index')->with('success', 'Jadwal imunisasi berhasil diperbarui');
    }

    public function destroy(Imunisasi $imunisasi)
    {
        $imunisasi->delete();
        return redirect()->route('imunisasi.index')->with('success', 'Jadwal imunisasi berhasil dihapus');
    }
}
