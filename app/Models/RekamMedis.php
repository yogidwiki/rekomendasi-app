<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';

    protected $fillable = [
        'orang_tua_id',
        'anak_id',
        'imunisasi',
        'riwayat_penyakit',
        'alergi',
    ];

    protected $casts = [
        'imunisasi' => 'array',
        'riwayat_penyakit' => 'array',
        'alergi' => 'array',
    ];

    public function orangTua()
    {
        return $this->belongsTo(OrangTua::class);
    }

    public function anak()
    {
        return $this->belongsTo(Anak::class);
    }
    
}
