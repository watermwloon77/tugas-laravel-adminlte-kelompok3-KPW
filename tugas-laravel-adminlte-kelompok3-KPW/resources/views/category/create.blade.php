@extends('template.master')

@section('title', 'Tambah Kategori Buket')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Contoh: Buket Bunga">
                        @error('nama')
                            <span class="error invalid-feedback" style="display: inline;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="px-3 d-flex justify-content-between align-items-center mb-3">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection