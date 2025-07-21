<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $table = "alamat";
    protected $fillable = [
        'user_id',
        'alamat',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'RT',
        'RW',
        'kode_pos',
        'is_utama'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'user_id');
    }
}
