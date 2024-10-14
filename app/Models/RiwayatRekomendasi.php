<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatRekomendasi extends Model
{
    use HasFactory;

    protected $table = 'riwayat_rekomendasi';

    protected $fillable = ['anak_id', 'orang_tua_id', 'kriteria', 'rekomendasi','kalori'];

    protected $casts = [
        'kriteria' => 'array',
        'rekomendasi' => 'array',
    ];

    public function anak()
    {
        return $this->belongsTo(Anak::class);
    }

    public function orangTua()
    {
        return $this->belongsTo(OrangTua::class);
    }
}
