@extends('layouts.main')

@section('title', 'TechStore Admin - Data User')
@section('page_heading', 'Daftar Anggota Kelompok & Staff')

@section('content')
<style>
    /* Styling Tema Biru Tua & Biru Muda */
    .card-theme-header {
        background: linear-gradient(90deg, #1e3a8a 0%, #0284c7 100%);
        color: #ffffff;
        border-radius: 12px 12px 0 0 !important;
        padding: 16px 20px;
    }
    .text-theme-navy {
        color: #1e3a8a;
    }
    .text-theme-sky {
        color: #0284c7;
    }
    .user-avatar-circle {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #0284c7 0%, #1e3a8a 100%);
        color: white;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(2, 132, 199, 0.2);
    }
    .btn-blue-sm {
        background: linear-gradient(90deg, #0284c7 0%, #1d4ed8 100%);
        border: none;
        color: #ffffff;
        font-weight: 600;
        border-radius: 6px;
        padding: 6px 14px;
        transition: all 0.2s ease;
    }
    .btn-blue-sm:hover {
        background: linear-gradient(90deg, #0369a1 0%, #1e40af 100%);
        color: #ffffff;
        box-shadow: 0 3px 8px rgba(2, 132, 199, 0.3);
    }
    .badge-role-admin {
        background-color: #1e3a8a;
        color: #ffffff;
    }
    .badge-role-staff {
        background-color: #e0f2fe;
        color: #0369a1;
        border: 1px solid #bae6fd;
    }
</style>

<!-- Banner Header Singkat -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-3 p-4" style="background: linear-gradient(135deg, #1e3a8a 0%, #0284c7 100%); color: white;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="fw-bold mb-1"><i class="fa-solid fa-users-gear me-2"></i>Anggota Kelompok 3 & Management Staff</h4>
                    <p class="mb-0 text-white-50 small">Kelola data profil anggota kelompok, peranan (role), dan status akses sistem TechStore Admin.</p>
                </div>
                <div class="d-none d-md-block opacity-50 fs-1 me-3">
                    <i class="fa-solid fa-address-card"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cards Ringkasan Tim / Profile Grid -->
<div class="row mb-4">
    <!-- Member 1 -->
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm rounded-3 text-center p-3">
            <div class="card-body">
                <div class="user-avatar-circle mx-auto mb-3" style="width: 60px; height: 60px; font-size: 22px;">
                    A1
                </div>
                <h6 class="fw-bold text-theme-navy mb-1">Anggota 1 (Ketua)</h6>
                <span class="badge badge-role-admin mb-2">Project Manager / Admin</span>
                <p class="text-muted small mb-3"><i class="fa-solid fa-envelope me-1 text-theme-sky"></i>anggota1@techstore.com</p>
                <div class="pt-2 border-top">
                    <span class="badge bg-success-subtle text-success border border-success"><i class="fa-solid fa-circle-check me-1"></i>Active</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Member 2 -->
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm rounded-3 text-center p-3">
            <div class="card-body">
                <div class="user-avatar-circle mx-auto mb-3" style="width: 60px; height: 60px; font-size: 22px; background: linear-gradient(135deg, #38bdf8 0%, #0284c7 100%);">
                    A2
                </div>
                <h6 class="fw-bold text-theme-navy mb-1">Anggota 2</h6>
                <span class="badge badge-role-staff mb-2">Frontend Developer</span>
                <p class="text-muted small mb-3"><i class="fa-solid fa-envelope me-1 text-theme-sky"></i>anggota2@techstore.com</p>
                <div class="pt-2 border-top">
                    <span class="badge bg-success-subtle text-success border border-success"><i class="fa-solid fa-circle-check me-1"></i>Active</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Member 3 -->
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm rounded-3 text-center p-3">
            <div class="card-body">
                <div class="user-avatar-circle mx-auto mb-3" style="width: 60px; height: 60px; font-size: 22px;">
                    A3
                </div>
                <h6 class="fw-bold text-theme-navy mb-1">Anggota 3</h6>
                <span class="badge badge-role-staff mb-2">Backend Developer</span>
                <p class="text-muted small mb-3"><i class="fa-solid fa-envelope me-1 text-theme-sky"></i>anggota3@techstore.com</p>
                <div class="pt-2 border-top">
                    <span class="badge bg-success-subtle text-success border border-success"><i class="fa-solid fa-circle-check me-1"></i>Active</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Lengkap User -->
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header card-theme-header d-flex align-items-center justify-content-between">
                <h6 class="m-0 fw-bold fs-6"><i class="fa-solid fa-list me-2"></i>Tabel Akses User TechStore</h6>
                <a href="{{ url('/form-input') }}" class="btn btn-blue-sm btn-sm text-white">
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
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-3">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar-circle me-3" style="width: 38px; height: 38px; font-size: 14px;">A1</div>
                                        <div>
                                            <div class="fw-bold text-dark">Anggota 1</div>
                                            <small class="text-muted">ID: USR-001</small>
                                        </div>
                                    </div>
                                </td>
                                <td>anggota1@techstore.com</td>
                                <td><span class="badge badge-role-admin">Administrator Toko</span></td>
                                <td>Laki-laki</td>
                                <td><span class="badge bg-success">Aktif</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-light border text-primary me-1"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button class="btn btn-sm btn-light border text-danger"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar-circle me-3" style="width: 38px; height: 38px; font-size: 14px; background: linear-gradient(135deg, #38bdf8 0%, #0284c7 100%);">A2</div>
                                        <div>
                                            <div class="fw-bold text-dark">Anggota 2</div>
                                            <small class="text-muted">ID: USR-002</small>
                                        </div>
                                    </div>
                                </td>
                                <td>anggota2@techstore.com</td>
                                <td><span class="badge badge-role-staff">Staff Inventaris</span></td>
                                <td>Perempuan</td>
                                <td><span class="badge bg-success">Aktif</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-light border text-primary me-1"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button class="btn btn-sm btn-light border text-danger"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3">
                                    <div class="d-flex align-items-center">
                                        <div class="user-avatar-circle me-3" style="width: 38px; height: 38px; font-size: 14px;">A3</div>
                                        <div>
                                            <div class="fw-bold text-dark">Anggota 3</div>
                                            <small class="text-muted">ID: USR-003</small>
                                        </div>
                                    </div>
                                </td>
                                <td>anggota3@techstore.com</td>
                                <td><span class="badge badge-role-staff">Kasir / Sales</span></td>
                                <td>Laki-laki</td>
                                <td><span class="badge bg-success">Aktif</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-light border text-primary me-1"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button class="btn btn-sm btn-light border text-danger"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection