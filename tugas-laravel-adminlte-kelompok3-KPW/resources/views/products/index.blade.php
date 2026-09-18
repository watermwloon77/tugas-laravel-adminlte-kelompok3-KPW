@extends('layouts.main')

@section('page_heading', 'Data Produk & Buket')

@section('content')
@php
    $userRole = strtolower(optional(auth()->user()->role)->name ?? '');
    $isAdmin = $userRole === 'admin';
@endphp

<div class="card card-primary shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold">
            <i class="fa-solid fa-box me-1"></i> Daftar Produk / Buket
        </h5>
        @if($isAdmin)
            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm fw-bold">
                <i class="fa-solid fa-plus me-1"></i> Tambah Produk
            </a>
        @endif
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        @if($isAdmin)
                            <th class="text-center">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="badge bg-secondary">{{ $product->kode_produk }}</span></td>
                            <td class="fw-semibold">{{ $product->nama_produk }}</td>
                            <td>{{ $product->category->nama ?? 'Tanpa Kategori' }}</td>
                            <td>Rp {{ number_format($product->harga_beli, 0, ',', '.') }}</td>
                            <td class="fw-bold text-success">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</td>
                            <td>
                                @if($product->stok <= 0)
                                    <span class="badge bg-danger">Habis</span>
                                @elseif($product->stok <= 5)
                                    <span class="badge bg-warning text-dark">{{ $product->stok }}</span>
                                @else
                                    <span class="badge bg-success">{{ $product->stok }}</span>
                                @endif
                            </td>
                            @if($isAdmin)
                            <td class="text-center">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">Belum ada data produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection