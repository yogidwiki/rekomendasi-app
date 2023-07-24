<?php

namespace App\Models;

use App\Models\User;
use App\Models\CategoryDiscussion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discussion extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'category_id', 'user_id'];

    public function category()
    {
        return $this->belongsTo(CategoryDiscussion::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
