<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    public $table = "pengiriman";
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'metode_pengiriman',
        'tanggal_pengiriman',
        'alamat_pengiriman',
        'status_pengiriman',
    ];
}
