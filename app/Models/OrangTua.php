<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;
    protected $table = 'orang_tua';
    protected $fillable = [
        'user_id', 'nama_ayah', 'nama_ibu', 'nomor_identitas', 'alamat', 'nomor_telepon', 
        'pekerjaan_ayah', 'pekerjaan_ibu', 'pendidikan_terakhir_ayah', 'pendidikan_terakhir_ibu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anak()
    {
        return $this->hasMany(Anak::class);
    }

    public function riwayatRekomendasi()
{
    return $this->hasMany(RiwayatRekomendasi::class);
}
}
