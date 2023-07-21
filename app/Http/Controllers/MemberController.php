<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('member.index',compact('members'));
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
    $data = $request->all();

    // Check if a file is uploaded
    if ($image = $request->file('image')) {
        $path = 'public/images';
        $namaGambar = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($path, $namaGambar);
        $data['image'] = $namaGambar;
    }

    // Ambil data dari input form untuk Instagram
    $instagramUsername = $request->input('instagram');

    // Pastikan URL dimulai dengan "https://instagram.com/"
    if (strpos($instagramUsername, 'https://instagram.com/') !== 0) {
        $instagramUsername = 'https://instagram.com/' . $instagramUsername;
    }

    // Ambil data dari input form untuk github
    $githubUsername = $request->input('github');

    // Pastikan URL dimulai dengan "https://github.com/"
    if (strpos($githubUsername, 'https://github.com/') !== 0) {
        $githubUsername = 'https://github.com/' . $githubUsername;
    }
    // Ambil data dari input form untuk linkedin
    $linkedinUsername = $request->input('linkedin');

    // Pastikan URL dimulai dengan "https://linkedin.com/"
    if (strpos($linkedinUsername, 'https://linkedin.com/') !== 0) {
        $linkedinUsername = 'https://linkedin.com/' . $linkedinUsername;
    }
    $data['instagram'] = $instagramUsername;
    $data['github'] = $githubUsername;
    $data['linkedin'] = $linkedinUsername;

    // Simpan data ke dalam database
    Member::create($data);

    return redirect()->route('member.index')->with('succes', 'Berhasil menambahkan member baru');
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
    public function update(Request $request, string $id)
{
    
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email|unique:members,email,' . $id,
        'instagram' => 'required',
        'github' => 'required',
        'linkedin' => 'required',
        'jenis_kelamin' => 'required',
        'image' => 'image' // Tambahkan validasi bahwa input 'image' harus berupa file gambar
    ]);

    $members = Member::findOrFail($id);

    // Update data anggota dengan data baru
    $members->nama = $request->input('nama');
    $members->email = $request->input('email');
    $members->instagram = $request->input('instagram');
    $members->github = $request->input('github');
    $members->linkedin = $request->input('linkedin');
    $members->jenis_kelamin = $request->input('jenis_kelamin');

    // Proses upload gambar baru jika ada
    if ($image = $request->file('image')) {
        $path = 'public/images';
        if ($members->image) {
            // Hapus gambar sebelumnya jika ada
            Storage::delete($path . '/' . $members->image);
        }

        $namaGambar = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($path, $namaGambar);

        // Update kolom 'image' dengan nama gambar baru
        $members->image = $namaGambar;
    }

    // Simpan perubahan yang sudah dilakukan
    $members->save();

    return redirect()->route('member.index')->with('succes', 'Berhasil mengupdate member');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $members = Member::findOrFail($id);
        $members->delete();

        return redirect()->route('member.index')->with('succes', 'Berhasil hapus user');
    }
}
