<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;
    protected $table="users";
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
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function alamat()
    {
        return $this->hasMany(Alamat::class, 'user_id');
    }
    public function dataAlamat()
    {
        return $this->hasMany(Alamat::class, 'user_id');
    }

    // hanya alamat utama (is_utama = true)
    public function getAlamatAttribute()
    {
        return $this->dataAlamat->where('is_utama', true)->first();
    }

}