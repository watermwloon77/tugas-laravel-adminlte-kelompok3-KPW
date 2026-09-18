@extends('layouts.main')

@section('page_heading', 'Kelola User & Hak Akses')

@section('content')
<div class="card card-primary shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold">
            <i class="fa-solid fa-users me-1"></i> Daftar User & Role Akses
        </h5>
        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm fw-bold">
            <i class="fa-solid fa-plus me-1"></i> Tambah User Baru
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="ps-3">User / Anggota</th>
                        <th>Email</th>
                        <th>Jabatan / Role</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $key => $u)
                    <tr>
                        <td class="ps-3">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary text-white fw-bold d-flex align-items-center justify-content-center me-3" style="width: 38px; height: 38px;">
                                    {{ strtoupper(substr($u->name, 0, 2)) }}
                                </div>
                                <div>
                                    <div class="fw-bold">{{ $u->name }}</div>
                                    <small class="text-muted">ID: USR-{{ str_pad($u->id, 3, '0', STR_PAD_LEFT) }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ $u->email }}</td>
                        <td>
                            @php
                                $roleName = strtolower(optional($u->role)->name ?? '');
                                $badgeClass = $roleName === 'admin' ? 'bg-primary' : ($roleName === 'owner' ? 'bg-dark' : ($roleName === 'kasir' ? 'bg-success' : 'bg-secondary'));
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ ucfirst($roleName ?: 'Staff') }}</span>
                        </td>
                        <td><span class="badge bg-success">Aktif</span></td>
                        <td class="text-center">
                            <a href="{{ route('users.edit', $u->id) }}" class="btn btn-sm btn-primary me-1" title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form action="{{ route('users.destroy', $u->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                    <i class="fa-solid fa-trash"></i> Hapus
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
@endsection