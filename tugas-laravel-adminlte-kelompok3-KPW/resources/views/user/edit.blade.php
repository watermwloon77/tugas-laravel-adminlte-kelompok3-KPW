@extends('layouts.main')

@section('page_heading', 'Edit User')

@section('content')
<div class="card card-primary shadow-sm" style="max-width: 600px;">
    <div class="card-header">
        <h5 class="card-title mb-0 fw-bold">
            <i class="fa-solid fa-pen-to-square me-1"></i> Form Edit User
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Password Baru (kosongkan jika tidak diganti)</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Minimal 6 karakter">
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-bold">Role / Jabatan</label>
                <select name="role_id" class="form-select @error('role_id') is-invalid @enderror" required>
                    @foreach($roles as $r)
                        <option value="{{ $r->id }}" {{ old('role_id', $user->role_id) == $r->id ? 'selected' : '' }}>
                            {{ ucfirst($r->name) }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary fw-bold">Update Data</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection