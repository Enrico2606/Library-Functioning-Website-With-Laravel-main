<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    public function cate(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'buku_id', 'id');
    }
}
