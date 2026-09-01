@extends('template.master')

@section('title', 'Detail Kategori Buket')

@section('content')
<div class="card">
    <div class="card-body">
        <h4><strong>Nama Kategori:</strong> {{ $category->nama }}</h4>
    </div>
    <div class="card-footer">
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection