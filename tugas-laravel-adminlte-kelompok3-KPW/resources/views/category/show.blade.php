@extends('layouts.main')

@section('page_heading', 'Detail Kategori Buket')

@section('content')
<div class="card card-primary shadow-sm" style="max-width: 600px;">
    <div class="card-header">
        <h5 class="card-title mb-0 fw-bold">
            <i class="fa-solid fa-eye me-1"></i> Detail Kategori
        </h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <span class="text-muted">Nama Kategori:</span>
            <h4 class="fw-bold mb-0 mt-1">{{ $category->nama }}</h4>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection