@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Produk Baru</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label>Kode Produk</label>
                    <input type="text" name="kode_produk" class="form-control @error('kode_produk') is-invalid @enderror" value="{{ old('kode_produk') }}" placeholder="Contoh: PRD001" required>
                    @error('kode_produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label>Kategori</label>
                   <select name="category_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Harga Beli</label>
                        <input type="number" name="harga_beli" class="form-control" value="{{ old('harga_beli') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Harga Jual</label>
                        <input type="number" name="harga_jual" class="form-control" value="{{ old('harga_jual') }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" value="{{ old('stok') }}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Simpan Produk</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection