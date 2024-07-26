<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = [
        'usia_balita', 
        'berat_badan', 
        'tinggi_badan', 
        'aktivitas_fisik', 
        'jenis_kelamin', 
        'kalori'
    ];
}
