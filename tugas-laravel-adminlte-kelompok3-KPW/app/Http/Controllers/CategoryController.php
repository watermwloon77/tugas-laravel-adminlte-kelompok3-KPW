<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
    $request->validate([
        'nama' => 'required|min:5',
    ]);

    // 2. Query Simpan Data ke Database
    DB::table('categories')->insert([
        'nama' => $request['nama'],
    ]);

    // 3. Redirect Kembali ke Halaman Index
    return redirect()->route('category.index')->with(['success' => 'Data Telah Ditambahkan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'nama' => 'required|min:5',
    ]);

    DB::table('categories')->where('id', $id)->update([
        'nama' => $request['nama'],
    ]);

    return redirect()->route('category.index')->with(['success' => 'Data Kategori Berhasil Diperbarui!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('category.index')->with(['success' => 'Data Kategori Berhasil Dihapus!']);
    }
}
