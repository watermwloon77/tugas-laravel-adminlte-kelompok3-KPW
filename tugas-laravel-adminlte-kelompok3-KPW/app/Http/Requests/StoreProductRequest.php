<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ubah ke true agar diizinkan
    }

    public function rules(): array
    {
        return [
            'kode_produk' => 'required|string|unique:products,kode_produk',
            'nama_produk' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'harga_beli'  => 'required|numeric|min:0',
            'harga_jual'  => 'required|numeric|gte:harga_beli',
            'stok'        => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'kode_produk.required' => 'Kode produk wajib diisi!',
            'kode_produk.unique'   => 'Kode produk sudah terdaftar!',
            'nama_produk.required' => 'Nama produk wajib diisi!',
            'category_id.required' => 'Kategori wajib dipilih!',
            'category_id.exists'   => 'Kategori tidak valid!',
            'harga_beli.required'  => 'Harga beli wajib diisi!',
            'harga_jual.required'  => 'Harga jual wajib diisi!',
            'harga_jual.gte'       => 'Harga jual tidak boleh lebih murah dari harga beli!',
            'stok.required'        => 'Stok wajib diisi!',
        ];
    }
}   