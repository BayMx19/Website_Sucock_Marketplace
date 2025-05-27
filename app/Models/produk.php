<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $table = "produk";
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'penjual_id',
        'nama_produk',
        'harga',
        'stok',
        'deskripsi',
        'gambar',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'penjual_id');
    }
    public function pesanan()
    {
        return $this->belongsToMany(pesanan::class);
    }
}