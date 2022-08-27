<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    protected $fillable = [
        'is_approved','status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
    public function favorite_to_user()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function scopeApproved($query){
        return $query->where('is_approved', 1);
    }
    public function scopePublished($query){
        return $query->where('status', 1);
    }

    use HasFactory;
}
