@extends('layouts.main')

@section('page_heading', 'Tambah Kategori Buket')

@section('content')
<div class="card card-primary shadow-sm" style="max-width: 600px;">
    <div class="card-header">
        <h5 class="card-title mb-0 fw-bold">
            <i class="fa-solid fa-plus me-1"></i> Form Tambah Kategori
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label fw-bold">Nama Kategori</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $category->nama ?? '') }}" placeholder="Masukkan nama kategori" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary fw-bold">Simpan Kategori</button>
            </div>
        </form>
    </div>
</div>
@endsection