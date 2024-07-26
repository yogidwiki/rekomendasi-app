<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $table = 'anak';

    protected $fillable = [
        'orang_tua_id', 'nama_lengkap', 'tanggal_lahir', 'jenis_kelamin', 'golongan_darah', 
        'berat_lahir', 'tinggi_lahir', 'lingkar_kepala_lahir', 'anak_ke', 'kondisi_kesehatan',
    ];

    public function orangTua()
    {
        return $this->belongsTo(OrangTua::class);
    }

    public function riwayatRekomendasi()
{
    return $this->hasMany(RiwayatRekomendasi::class);
}
}
