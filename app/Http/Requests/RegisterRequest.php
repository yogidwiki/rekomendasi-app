<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nama_ayah' => ['required', 'string', 'max:255'],
            'nama_ibu' => ['required', 'string', 'max:255'],
            'nomor_identitas' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'nomor_telepon' => ['required', 'string', 'max:15'],
            'pekerjaan_ayah' => ['required', 'string', 'max:255'],
            'pekerjaan_ibu' => ['required', 'string', 'max:255'],
            'pendidikan_terakhir_ayah' => ['required', 'string', 'max:255'],
            'pendidikan_terakhir_ibu' => ['required', 'string', 'max:255'],
        ];
    }
}
