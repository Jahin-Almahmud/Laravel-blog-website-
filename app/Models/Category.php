<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'Category_Name',
        'slug',
        'image'
    ];
    public function posts()
    {
         return $this->belongsToMany(Post::class)->withTimestamps();

    }

    use HasFactory;
}
