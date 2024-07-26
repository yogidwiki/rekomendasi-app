<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    use HasFactory;
    protected $table = 'imunisasi';
    protected $fillable = ['nama_imunisasi', 'tanggal_imunisasi', 'tempat_imunisasi', 'usia_bulan'];
}
