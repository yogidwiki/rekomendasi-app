<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OrangTua;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nama_ayah' => ['required', 'string'],
            'nama_ibu' => ['required', 'string'],
            'nomor_identitas' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'nomor_telepon' => ['required', 'string'],
            'pekerjaan_ayah' => ['required', 'string'],
            'pekerjaan_ibu' => ['required', 'string'],
            'pendidikan_terakhir_ayah' => ['required', 'string'],
            'pendidikan_terakhir_ibu' => ['required', 'string'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        OrangTua::create([
            'user_id' => $user->id,
            'nama_ayah' => $data['nama_ayah'],
            'nama_ibu' => $data['nama_ibu'],
            'nomor_identitas' => $data['nomor_identitas'],
            'alamat' => $data['alamat'],
            'nomor_telepon' => $data['nomor_telepon'],
            'pekerjaan_ayah' => $data['pekerjaan_ayah'],
            'pekerjaan_ibu' => $data['pekerjaan_ibu'],
            'pendidikan_terakhir_ayah' => $data['pendidikan_terakhir_ayah'],
            'pendidikan_terakhir_ibu' => $data['pendidikan_terakhir_ibu'],
        ]);

        return $user;
    }
}
