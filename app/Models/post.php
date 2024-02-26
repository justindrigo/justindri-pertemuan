<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $fillable=['title', 'content', 'category_id', 'user_id', 'status'];

    //relasi post ke Category (one to one)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //relasi post ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
