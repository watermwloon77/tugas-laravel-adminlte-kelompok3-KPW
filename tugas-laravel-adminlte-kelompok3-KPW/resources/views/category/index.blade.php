@extends('layouts.main')

@section('page_heading', 'Data Kategori Buket')

@section('content')
<div class="card card-primary shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold">
            <i class="fa-solid fa-tags me-1"></i> Daftar Kategori Buket
        </h5>
        <a href="{{ route('category.create') }}" class="btn btn-success btn-sm fw-bold">
            <i class="fa-solid fa-plus me-1"></i> Tambah Kategori
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="fw-semibold">{{ $value->nama }}</td>
                            <td class="text-center">
                                <a href="{{ route('category.show', $value->id) }}" class="btn btn-sm btn-info">
                                    <i class="fa-solid fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('category.edit', $value->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('category.destroy', $value->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">Data kategori masih kosong.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection