<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'penjualan_id',
        'product_id',
        'qty',
        'harga_beli',
        'harga_jual',
        'subtotal',
    ];

    // Relasi ke Penjualan
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }

    // Relasi ke Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}