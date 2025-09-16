<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $table = "promos";
    protected $guarded = ['id'];
    public function penjual()
    {
        return $this->belongsTo(User::class, 'penjual_id');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'promo_id');
    }
}
