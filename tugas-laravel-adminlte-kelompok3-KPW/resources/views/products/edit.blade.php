@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Produk</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label>Kode Produk</label>
                    <input type="text" name="kode_produk" class="form-control" value="{{ old('kode_produk', $product->kode_produk) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk', $product->nama_produk) }}" required>
                </div>

                <div class="form-group mb-3">
                    <label>Kategori</label>
                    <select name="category_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Harga Beli</label>
                        <input type="number" name="harga_beli" class="form-control" value="{{ old('harga_beli', $product->harga_beli) }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Harga Jual</label>
                        <input type="number" name="harga_jual" class="form-control" value="{{ old('harga_jual', $product->harga_jual) }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ old('stok', $product->stok) }}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Produk</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection