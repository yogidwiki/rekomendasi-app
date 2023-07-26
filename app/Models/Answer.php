<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'score'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
