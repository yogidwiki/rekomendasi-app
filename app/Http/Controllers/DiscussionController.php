<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discussions = Discussion::all();
        return view('discussions.index', compact('discussions'));
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
        'content' => 'required|string',
        'category_id' => 'required|exists:categories,id'
    ], [
        'content.required' => 'Diskusi tidak boleh kosong!',
        // Aturan validasi lainnya
    ]);

    // Ambil ID pengguna yang login saat ini
    $user_id = Auth::user()->id;

    // Tambahkan 'user_id' dalam data request
    $data = $request->all();
    $data['user_id'] = $user_id;

    try {
        Discussion::create($data);
        return redirect()->back()->with('success', 'Berhasil membuat diskusi');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal membuat diskusi. Pastikan Anda telah mengisi konten.');

    }
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $discussion = Discussion::with('comments')->findOrFail($id);
        
        return view('landingpage.detail-diskusi', compact('discussion'));
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
    public function update(Request $request, Discussion $discussion)
    {
        // Pastikan pengguna yang sedang login adalah pemilik diskusi sebelum mengizinkan update
        if (Auth::user()->id !== $discussion->user_id) {
            abort(403); // Akses ditolak (Forbidden)
        }

        // Lakukan validasi pada data yang akan diupdate
        // $request->validate([
        //     'content' => 'required|string',
        //     'category_id' => 'required|exists:categories,id'
        // ]);

        // Update data diskusi
        $discussion->update($request->all());

        return redirect()->back()->with('success', 'Berhasil edit diskusi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discussion $discussion)
    {
        // Pastikan pengguna yang sedang login adalah pemilik diskusi sebelum mengizinkan penghapusan
        if (Auth::user()->id !== $discussion->user_id) {
            abort(403); // Akses ditolak (Forbidden)
        }

        // Hapus diskusi
        $discussion->delete();

        return redirect()->back()->with('success', 'Diskusi berhasil dihapus');
    }

    public function getDiskusiByPage($page)
{
    $discussions = Discussion::orderBy('created_at', 'desc')
                             ->paginate(4, ['*'], 'page', $page);

    return view('landingpage.diskusi-partial', compact('discussions'));
}
}
