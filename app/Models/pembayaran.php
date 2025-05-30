<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    public $table = "pembayaran";
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pesanan_id',
        'metode_pembayaran',
        'tanggal_pembayaran',
        'status_pembayaran',
    ];
}
