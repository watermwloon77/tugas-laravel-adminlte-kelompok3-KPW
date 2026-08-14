@extends('layouts.main')

@section('title', 'TechStore Admin - Input Data')
@section('page_heading', 'Form Input Data')

@section('content')
<style>
    /* Styling khusus Tema Biru Tua & Biru Muda */
    .card-theme {
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        background: #ffffff;
    }
    .card-header-blue {
        background: linear-gradient(90deg, #1e3a8a 0%, #0284c7 100%);
        color: #ffffff;
        border-radius: 12px 12px 0 0 !important;
        padding: 16px 20px;
    }
    .form-label {
        font-weight: 600;
        color: #1e3a8a;
        font-size: 14px;
    }
    .form-control, .form-select {
        border: 1.5px solid #cbd5e1;
        border-radius: 8px;
        padding: 10px 14px;
        font-size: 14px;
    }
    .form-control:focus, .form-select:focus {
        border-color: #0284c7;
        box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
    }
    .input-group-text {
        background-color: #f1f5f9;
        border: 1.5px solid #cbd5e1;
        border-right: none;
        color: #1e3a8a;
        border-radius: 8px 0 0 8px;
    }
    .input-group .form-control {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .btn-blue-primary {
        background: linear-gradient(90deg, #0284c7 0%, #1d4ed8 100%);
        border: none;
        color: #ffffff;
        font-weight: 600;
        padding: 10px 24px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .btn-blue-primary:hover {
        background: linear-gradient(90deg, #0369a1 0%, #1e40af 100%);
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(2, 132, 199, 0.3);
    }
    .btn-reset-custom {
        background-color: #f1f5f9;
        border: 1px solid #cbd5e1;
        color: #64748b;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 8px;
    }
    .btn-reset-custom:hover {
        background-color: #e2e8f0;
        color: #334155;
    }
</style>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card card-theme">
            <!-- Header Card dengan Gradasi Biru -->
            <div class="card-header card-header-blue d-flex align-items-center justify-content-between">
                <h5 class="m-0 fw-bold fs-6">
                    <i class="fa-solid fa-user-plus me-2 text-info"></i>Form Tambah Staff / Anggota TechStore
                </h5>
                <span class="badge bg-white text-dark opacity-75">TechStore Management</span>
            </div>

            <!-- Body Card Form -->
            <div class="card-body p-4">
                <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Data berhasil disimpan!');">
                    
                    <div class="row">
                        <!-- Nama Lengkap -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Masukkan nama lengkap staff..." required>
                            </div>
                        </div>

                        <!-- Email / Username -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Email / Username Staff</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="contoh: staff@techstore.com" required>
                            </div>
                        </div>

                        <!-- Peran / Role -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Peran / Jabatan (Role)</label>
                            <select class="form-select" required>
                                <option value="" selected disabled>-- Pilih Role --</option>
                                <option value="admin">Administrator Toko</option>
                                <option value="inventory">Staff Inventaris Gadget</option>
                                <option value="kasir">Kasir / Sales Staff</option>
                                <option value="manager">Manager Operasional</option>
                            </select>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-select" required>
                                <option value="" selected disabled>-- Pilih Gender --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <!-- Catatan / Alamat -->
                        <div class="col-md-12 mb-4">
                            <label class="form-label">Catatan / Alamat Rumah</label>
                            <textarea class="form-control" rows="3" placeholder="Masukkan detail catatan staff atau alamat lengkap..."></textarea>
                        </div>
                    </div>

                    <!-- Footer Action Buttons -->
                    <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                        <button type="reset" class="btn btn-reset-custom">
                            <i class="fa-solid fa-rotate-left me-1"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-blue-primary">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Data
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection