<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

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
    if($image = $request->file('image')){
        $path = 'public/images';
        $namaGambar = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($path, $namaGambar);
        $data['image'] = $namaGambar;
    }

    // Create a new member
    Member::create($data);

    return redirect()->route('member.index')->with('success', 'User berhasil ditambahkan.');
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
         dd($request);
         $request->validate([
         'name' => 'required',
         'email' => 'required|email|unique:users,email,'.$id,
         'instagram' => 'required',
         'github' => 'required',
         'linkedin' => 'required',
         'jenis_kelamin' => 'required',
         'image' => 'required'
        
        ]);

    $members = Member::findOrFail($id);

    $members->nama = $request->input('nama');
    $members->email = $request->input('email');
    $members->instagram = $request->input('instagram');
    $members->github = $request->input('github');
    $members->linkedin = $request->input('linkedin');
    $members->jenis_kelamin = $request->input('jenis_kelamin');
    $members->image = $request->input('image');

    $members->save();

    return redirect()->route('member.index')->with('success', 'Berhasil mengupdate member');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $members = Member::findOrFail($id);
        $members->delete();

        return redirect()->route('member.index')->with('success', 'Berhasil hapus user');
    }
}
