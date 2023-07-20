<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'no', 
        'nama', 
        'email', 
        'jenis_kelamin',
        'image'
    ];

}

