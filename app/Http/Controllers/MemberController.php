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
    if ($request->hasFile('image')) {
        // Change the file name
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
    
        // Move the file to the storage folder with the new name
        $imagePath = $request->file('image')->storeAs('public/images', $imageName);
    
        // Assign the image path to the data
        $data['image'] = $imagePath;
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
        // dd($request);
    //     $request->validate([
    //     'name' => 'required',
    //     'email' => 'required|email|unique:users,email,'.$id,
    //     'jenis_kelamin' => 'required',
    //     'image' => 'required'
        
    // ]);

    $members = Member::findOrFail($id);

    $members->nama = $request->input('nama');
    $members->email = $request->input('email');
    $members->instagram = $request->input('instagram');
    $members->github = $request->input('github');
    $members->linkedin = $request->input('linkedin');
    $members->jenis_kelamin = $request->input('jenis_kelamin');

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
