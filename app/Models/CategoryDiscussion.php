<?php

namespace App\Models;

use App\Models\Discussion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryDiscussion extends Model
{
    use HasFactory;
    protected $table = 'categories_discussions';
    protected $fillable = [
        'name',
    ];

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
}
