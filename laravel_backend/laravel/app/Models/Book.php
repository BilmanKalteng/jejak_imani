<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_nama',
        'tanggal_berangkat',
        'paket_id',
        'maskapai_id',
        'book_sheet',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function maskapai()
    {
        return $this->belongsTo(Maskapai::class);
    }
}
