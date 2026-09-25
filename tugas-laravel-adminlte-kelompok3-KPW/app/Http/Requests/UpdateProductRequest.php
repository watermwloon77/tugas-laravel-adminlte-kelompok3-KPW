<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Ubah ke true
    }

    public function rules(): array
    {
        // Mengambil ID produk dari Route Model Binding
        $product = $this->route('product');
        $productId = is_object($product) ? $product->id : $product;

        return [
            'kode_produk' => 'required|string|unique:products,kode_produk,' . $productId,
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
            'kode_produk.unique'   => 'Kode produk sudah digunakan oleh produk lain!',
            'nama_produk.required' => 'Nama produk wajib diisi!',
            'category_id.required' => 'Kategori wajib dipilih!',
            'harga_jual.gte'       => 'Harga jual tidak boleh lebih murah dari harga beli!',
        ];
    }
}