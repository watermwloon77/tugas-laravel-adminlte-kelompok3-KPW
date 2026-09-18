@extends('layouts.main')

@section('page_heading', 'Edit Kategori Buket')

@section('content')
<div class="card card-primary shadow-sm" style="max-width: 600px;">
    <div class="card-header">
        <h5 class="card-title mb-0 fw-bold">
            <i class="fa-solid fa-pen-to-square me-1"></i> Form Edit Kategori
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label fw-bold">Nama Kategori</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama', $category->nama) }}" placeholder="Masukkan nama kategori">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary fw-bold">Update Data</button>
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection