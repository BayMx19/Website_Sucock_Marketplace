<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    public $table = "review";

    protected $fillable = [
        'produk_id',
        'user_id',
        'bintang',
        'review_text'
    ];

}