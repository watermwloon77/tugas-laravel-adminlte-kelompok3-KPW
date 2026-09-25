<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    // Kasir hanya boleh melihat daftar produk, bukan mengelolanya
    private function authorizeManage()
    {
        $role = strtolower(optional(auth()->user()->role)->name ?? '');
        abort_if($role !== 'admin', 403, 'Anda tidak memiliki akses untuk mengelola produk.');
    }

    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $this->authorizeManage();
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        $this->authorizeManage();

        // Menggunakan data yang sudah tervalidasi oleh StoreProductRequest
        Product::create($request->validated());

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $this->authorizeManage();
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorizeManage();

        // Menggunakan data yang sudah tervalidasi oleh UpdateProductRequest
        $product->update($request->validated());

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        $this->authorizeManage();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}