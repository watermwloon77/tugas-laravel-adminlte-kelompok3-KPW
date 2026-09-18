<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $this->authorizeManage();

        $request->validate([
            'kode_produk' => 'required|unique:products,kode_produk',
            'nama_produk' => 'required',
            'category_id' => 'required',
            'harga_beli'  => 'required|numeric',
            'harga_jual'  => 'required|numeric',
            'stok'        => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        $this->authorizeManage();
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $this->authorizeManage();

        $request->validate([
            'kode_produk' => 'required|unique:products,kode_produk,' . $product->id,
            'nama_produk' => 'required',
            'category_id' => 'required',
            'harga_beli'  => 'required|numeric',
            'harga_jual'  => 'required|numeric',
            'stok'        => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        $this->authorizeManage();
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}