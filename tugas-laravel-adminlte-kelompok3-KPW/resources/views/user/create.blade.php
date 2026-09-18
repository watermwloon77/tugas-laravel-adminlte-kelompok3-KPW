@extends('layouts.main')

@section('page_heading', 'Tambah User Baru')

@section('content')
<div class="card card-primary shadow-sm" style="max-width: 600px;">
    <div class="card-header">
        <h5 class="card-title mb-0 fw-bold">
            <i class="fa-solid fa-user-plus me-1"></i> Form Tambah User
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="contoh@gmail.com" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 6 karakter" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Role / Jabatan</label>
                <select name="role_id" class="form-select @error('role_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Role --</option>
                    @foreach($roles as $r)
                        <option value="{{ $r->id }}" {{ old('role_id') == $r->id ? 'selected' : '' }}>
                            {{ ucfirst($r->name) }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary fw-bold">
                    <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection