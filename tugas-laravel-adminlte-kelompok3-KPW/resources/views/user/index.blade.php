@extends('layouts.main')

@section('title', 'TechStore Admin - Data User')
@section('page_heading', 'Daftar Anggota Kelompok & Staff')

@section('content')
<style>
    /* Styling Tema Amber & Dark Gold */
    .card-theme-header {
        background: linear-gradient(90deg, #1c1917 0%, #78350f 100%);
        color: #ffffff;
        border-radius: 12px 12px 0 0 !important;
        padding: 16px 20px;
        border-bottom: 3px solid #f59e0b;
    }
    .text-theme-navy {
        color: #1c1917;
    }
    .text-theme-amber {
        color: #d97706;
    }
    .user-avatar-circle {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #f59e0b 0%, #b45309 100%);
        color: white;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(245, 158, 11, 0.25);
    }
    .btn-amber-sm {
        background: linear-gradient(90deg, #f59e0b 0%, #d97706 100%);
        border: none;
        color: #ffffff;
        font-weight: 600;
        border-radius: 6px;
        padding: 6px 14px;
        transition: all 0.2s ease;
    }
    .btn-amber-sm:hover {
        background: linear-gradient(90deg, #d97706 0%, #b45309 100%);
        color: #ffffff;
        box-shadow: 0 3px 8px rgba(217, 119, 6, 0.35);
    }
    .badge-role-admin {
        background-color: #78350f;
        color: #fef3c7;
        border: 1px solid #b45309;
    }
    .badge-role-staff {
        background-color: #fef3c7;
        color: #92400e;
        border: 1px solid #fde68a;
    }
</style>

<!-- Banner Header Singkat -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-3 p-4" style="background: linear-gradient(135deg, #1c1917 0%, #78350f 100%); color: white; border-left: 5px solid #f59e0b !important;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="fw-bold mb-1"><i class="fa-solid fa-users-gear me-2 text-warning"></i>Anggota Kelompok 3 & Management Staff</h4>
                    <p class="mb-0 text-white-50 small">Kelola data profil anggota kelompok, peranan (role), dan status akses sistem TechStore Admin.</p>
                </div>
                <div class="d-none d-md-block opacity-50 fs-1 me-3 text-warning">
                    <i class="fa-solid fa-address-card"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Notifikasi Sukses / Pesan -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Cards Ringkasan Tim / Profile Grid -->
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm rounded-3 text-center p-3">
            <div class="card-body">
                <div class="user-avatar-circle mx-auto mb-3" style="width: 60px; height: 60px; font-size: 22px;">A1</div>
                <h6 class="fw-bold text-theme-navy mb-1">Anggota 1 (Ketua)</h6>
                <span class="badge badge-role-admin mb-2">Project Manager / Admin</span>
                <p class="text-muted small mb-3"><i class="fa-solid fa-envelope me-1 text-theme-amber"></i>anggota1@techstore.com</p>
                <div class="pt-2 border-top">
                    <span class="badge bg-success-subtle text-success border border-success"><i class="fa-solid fa-circle-check me-1"></i>Active</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm rounded-3 text-center p-3">
            <div class="card-body">
                <div class="user-avatar-circle mx-auto mb-3" style="width: 60px; height: 60px; font-size: 22px; background: linear-gradient(135deg, #fbbf24 0%, #d97706 100%);">A2</div>
                <h6 class="fw-bold text-theme-navy mb-1">Anggota 2</h6>
                <span class="badge badge-role-staff mb-2">Frontend Developer</span>
                <p class="text-muted small mb-3"><i class="fa-solid fa-envelope me-1 text-theme-amber"></i>anggota2@techstore.com</p>
                <div class="pt-2 border-top">
                    <span class="badge bg-success-subtle text-success border border-success"><i class="fa-solid fa-circle-check me-1"></i>Active</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm rounded-3 text-center p-3">
            <div class="card-body">
                <div class="user-avatar-circle mx-auto mb-3" style="width: 60px; height: 60px; font-size: 22px;">A3</div>
                <h6 class="fw-bold text-theme-navy mb-1">Anggota 3</h6>
                <span class="badge badge-role-staff mb-2">Backend Developer</span>
                <p class="text-muted small mb-3"><i class="fa-solid fa-envelope me-1 text-theme-amber"></i>anggota3@techstore.com</p>
                <div class="pt-2 border-top">
                    <span class="badge bg-success-subtle text-success border border-success"><i class="fa-solid fa-circle-check me-1"></i>Active</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Lengkap User dari Database -->
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header card-theme-header d-flex align-items-center justify-content-between">
                <h6 class="m-0 fw-bold fs-6"><i class="fa-solid fa-list me-2 text-warning"></i>Tabel Akses User TechStore</h6>
                {{-- TOMBOL SUDAH DIUBAH MENGGUNAKAN ROUTE LARAVEL --}}
                <a href="{{ route('users.create') }}" class="btn btn-amber-sm btn-sm text-white">
                    <i class="fa-solid fa-plus me-1"></i> Tambah User Baru
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">User / Anggota</th>
                                <th>Email</th>
                                <th>Jabatan / Role</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- MENGGUNAKAN FOREACH DARI DATABASE --}}
                            @forelse($users as $key => $u)
                            <tr>
                                <td class="ps-3">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar-circle me-3" style="width: 38px; height: 38px; font-size: 14px;">
                                            {{ strtoupper(substr($u->name, 0, 2)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $u->name }}</div>
                                            <small class="text-muted">ID: USR-{{ str_pad($u->id, 3, '0', STR_PAD_LEFT) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <span class="badge {{ optional($u->role)->nama == 'Administrator' ? 'badge-role-admin' : 'badge-role-staff' }}">
                                        {{ $u->role->nama ?? 'Staff' }}
                                    </span>
                                </td>
                                <td><span class="badge bg-success">Aktif</span></td>
                                <td class="text-center">
                                    {{-- TOMBOL EDIT SUDAH MENGGUNAKAN ROUTE --}}
                                    <a href="{{ route('users.edit', $u->id) }}" class="btn btn-sm btn-light border text-warning me-1" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    
                                    {{-- FORM HAPUS UNTUK DELETE USER --}}
                                    <form action="{{ route('users.destroy', $u->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border text-danger" title="Hapus">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada data user di database.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
