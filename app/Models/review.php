<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    public $table = "review";

    protected $fillable = [
        'pesanan_id',
        'produk_id',
        'bintang',
        'review_text'
    ];

    public function pesanan()
    {
        return $this->belongsTo(pesanan::class);
    }
    public function produk()
    {
        return $this->belongsTo(produk::class);
    }

}
