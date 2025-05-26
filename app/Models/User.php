<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nohp',
        'email',
        'password',
        'role',
        'alamat',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'RT',
        'RW',
        'kode_pos',
        'foto_profil',
        'jenis_kelamin',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function datapembeli()
    {
        return $this->belongsTo(datapembeli::class);
    }
    public function datapenjual()
    {
        return $this->belongsTo(datapenjual::class);
    }
    public function produk()
    {
        return $this->hasMany(produk::class);
    }
    public function pesanan()
    {
        return $this->hasMany(pesanan::class);
    }
}