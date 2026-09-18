@extends('layouts.main')

@section('page_heading', 'Edit Produk')

@section('content')
<div class="card card-primary shadow-sm" style="max-width: 720px;">
    <div class="card-header">
        <h5 class="card-title mb-0 fw-bold">
            <i class="fa-solid fa-pen-to-square me-1"></i> Form Edit Produk / Buket
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label class="form-label fw-bold">Kode Produk</label>
                <input type="text" name="kode_produk" class="form-control @error('kode_produk') is-invalid @enderror" value="{{ old('kode_produk', $product->kode_produk) }}" required>
                @error('kode_produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-label fw-bold">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk', $product->nama_produk) }}" required>
                @error('nama_produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="form-group mb-3">
                <label class="form-label fw-bold">Kategori</label>
                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->nama }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Harga Beli</label>
                    <input type="number" name="harga_beli" class="form-control @error('harga_beli') is-invalid @enderror" value="{{ old('harga_beli', $product->harga_beli) }}" required>
                    @error('harga_beli')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Harga Jual</label>
                    <input type="number" name="harga_jual" class="form-control @error('harga_jual') is-invalid @enderror" value="{{ old('harga_jual', $product->harga_jual) }}" required>
                    @error('harga_jual')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Stok</label>
                    <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok', $product->stok) }}" required>
                    @error('stok')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary fw-bold">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Update Produk
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection