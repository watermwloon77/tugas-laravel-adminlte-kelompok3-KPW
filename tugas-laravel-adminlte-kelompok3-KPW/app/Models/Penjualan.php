<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_nota',
        'tanggal',
        'total_harga',
        'bayar',
        'kembalian',
        'user_id',
    ];

    // Relasi ke DetailPenjualan
    public function details()
    {
        return $this->hasMany(DetailPenjualan::class);
    }

    // Relasi ke User (Kasir)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}