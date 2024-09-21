<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function buku(){
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }

    protected $table = "reviews";
   	protected $dates = ['deleted_at'];
}
