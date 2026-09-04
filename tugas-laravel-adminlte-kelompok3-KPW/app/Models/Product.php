<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'category_id',
        'harga_beli',
        'harga_jual',
        'stok',
    ];

    // Relasi: Produk ini milik satu Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}