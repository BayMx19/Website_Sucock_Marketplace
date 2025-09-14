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

    protected $table="users";
    protected $fillable = [
        'name',
        'nohp',
        'email',
        'password',
        'role',
        'foto_profil',
        'jenis_kelamin',
        'status',
        'otp_code',
        'otp_expires_at',
        'email_verified_at',
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

    public function produk()
    {
        return $this->hasMany(produk::class);
    }
    public function pesanan()
    {
        return $this->hasMany(pesanan::class);
    }
    public function dataAlamat()
    {
        return $this->hasMany(Alamat::class, 'user_id');
    }

    public function penjual() {
        return $this->belongsTo(User::class, 'penjual_id');
    }
    public function getAlamatAttribute()
    {
        return $this->dataAlamat()->where('is_utama', true)->first();
    }
}
