<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datapenjual extends Model
{
    public $table = "datapenjual";
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'alamattoko',
        'fotoprofiltoko',
        'namatoko',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
