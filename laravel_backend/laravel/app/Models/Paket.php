<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    //
    Use HasFactory;

    protected $fillable = [
        'nama_paket',
        'harga_paket',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
