<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            // 'gender' => 'required',
            // 'birthday' => 'required|date',
            'nomor_identitas' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'role' => 'required'
        ]);
        $isAdmin = $request->input('role') === 'admin' ? true : false;

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            // 'gender' => $request->input('gender'),
            // 'birthday' => $request->input('birthday'),
            'nomor_identitas' => $request->input('nomor_identitas'),
            'alamat' => $request->input('alamat'),
            'nomor_telepon' => $request->input('nomor_telepon'),
            'is_admin' => $isAdmin,
        ]);

        return redirect()->route('users.index')->with('success', 'Berhasil menambahkan user');
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'nomor_identitas' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'role' => 'required'
        ]);
    
        $isAdmin = $request->input('role') === 'admin' ? true : false;
    
        // Update data di tabel Users
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->is_admin = $isAdmin;
        $user->save();
    
        // Update data di tabel OrangTua (pastikan ada relasi dengan User)
        $orangTua = OrangTua::where('user_id', $id)->first();
        if ($orangTua) {
            $orangTua->nomor_identitas = $request->input('nomor_identitas');
            $orangTua->alamat = $request->input('alamat');
            $orangTua->nomor_telepon = $request->input('nomor_telepon');
            $orangTua->save();
        } else {
            // Jika data orang tua belum ada, buat yang baru
            OrangTua::create([
                'user_id' => $user->id,
                'nomor_identitas' => $request->input('nomor_identitas'),
                'alamat' => $request->input('alamat'),
                'nomor_telepon' => $request->input('nomor_telepon'),
            ]);
        }
    
        return redirect()->route('users.index')->with('success', 'Berhasil mengupdate user dan data orang tua');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Berhasil hapus user');
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = User::find($request->user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Password berhasil direset.',
        ]);
    }
}
