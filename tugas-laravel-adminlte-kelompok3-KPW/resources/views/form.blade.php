@extends('layouts.main')

@section('title', 'TechStore Admin - Input Data')
@section('page_heading', 'Form Input Data')

@section('content')

<style>
    /* ================================
       TECHSTORE FORM THEME
       Mengikuti tema Dashboard:
       Orange + Dark Navy
    ================================= */

    .tech-form-wrapper {
        max-width: 1100px;
        margin: 0 auto;
    }

    /* Card utama */
    .tech-form-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 8px 25px rgba(31, 45, 61, 0.12);
    }

    /* Header */
    .tech-form-header {
        background: linear-gradient(90deg, #1f2d3d 0%, #263b50 100%);
        color: #ffffff;
        padding: 20px 24px;
        border: none;
    }

    .tech-form-header .header-icon {
        width: 44px;
        height: 44px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #f59e0b;
        color: #ffffff;
        font-size: 19px;
        margin-right: 12px;
    }

    .tech-form-header h5 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
    }

    .tech-form-header p {
        margin: 3px 0 0;
        color: #cbd5e1;
        font-size: 13px;
    }

    .tech-form-badge {
        background: #f59e0b;
        color: #ffffff;
        font-weight: 700;
        padding: 8px 13px;
        border-radius: 7px;
        font-size: 12px;
    }

    /* Body */
    .tech-form-body {
        padding: 28px;
        background: #ffffff;
    }

    /* Section */
    .form-section-title {
        display: flex;
        align-items: center;
        gap: 9px;
        color: #1f2d3d;
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 22px;
        padding-bottom: 10px;
        border-bottom: 2px solid #f1f5f9;
    }

    .form-section-title i {
        color: #f59e0b;
    }

    /* Label */
    .tech-form-label {
        display: block;
        color: #1f2d3d;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .required-mark {
        color: #ef4444;
    }

    /* Input Group */
    .tech-input-group {
        display: flex;
        width: 100%;
    }

    .tech-input-icon {
        width: 48px;
        min-width: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8fafc;
        border: 1.5px solid #d7dee8;
        border-right: none;
        color: #f59e0b;
        border-radius: 9px 0 0 9px;
    }

    .tech-form-control,
    .tech-form-select {
        width: 100%;
        min-height: 46px;
        border: 1.5px solid #d7dee8;
        border-radius: 9px;
        padding: 10px 14px;
        color: #1f2937;
        background: #ffffff;
        font-size: 14px;
        outline: none;
        transition: all 0.2s ease;
    }

    .tech-input-group .tech-form-control {
        border-radius: 0 9px 9px 0;
    }

    .tech-form-control::placeholder {
        color: #94a3b8;
    }

    .tech-form-control:focus,
    .tech-form-select:focus {
        border-color: #f59e0b;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.14);
    }

    .tech-form-select {
        cursor: pointer;
    }

    /* Textarea */
    textarea.tech-form-control {
        min-height: 115px;
        resize: vertical;
    }

    /* Hint */
    .form-hint {
        display: block;
        margin-top: 6px;
        font-size: 12px;
        color: #94a3b8;
    }

    /* Info Box */
    .form-info-box {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        background: #fff7ed;
        border: 1px solid #fed7aa;
        border-left: 4px solid #f59e0b;
        border-radius: 8px;
        padding: 12px 14px;
        margin-bottom: 24px;
        color: #7c2d12;
        font-size: 13px;
    }

    .form-info-box i {
        color: #f59e0b;
        margin-top: 2px;
    }

    /* Footer */
    .tech-form-footer {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
        padding-top: 22px;
        margin-top: 5px;
        border-top: 1px solid #e5e7eb;
    }

    /* Reset */
    .btn-tech-reset {
        border: 1.5px solid #d1d5db;
        background: #ffffff;
        color: #475569;
        font-weight: 700;
        padding: 10px 20px;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .btn-tech-reset:hover {
        background: #f1f5f9;
        border-color: #94a3b8;
        color: #1f2937;
    }

    /* Save */
    .btn-tech-save {
        border: none;
        background: linear-gradient(90deg, #f59e0b 0%, #f97316 100%);
        color: #ffffff;
        font-weight: 700;
        padding: 11px 23px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.25);
        transition: all 0.2s ease;
    }

    .btn-tech-save:hover {
        background: linear-gradient(90deg, #d97706 0%, #ea580c 100%);
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(245, 158, 11, 0.3);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .tech-form-body {
            padding: 20px;
        }

        .tech-form-header {
            padding: 17px 18px;
        }

        .tech-form-badge {
            display: none;
        }

        .tech-form-footer {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .btn-tech-reset,
        .btn-tech-save {
            width: 100%;
        }
    }
</style>


<div class="tech-form-wrapper">

    <div class="card tech-form-card">

        {{-- HEADER --}}
        <div class="tech-form-header d-flex align-items-center justify-content-between">

            <div class="d-flex align-items-center">

                <div class="header-icon">
                    <i class="fa-solid fa-user-plus"></i>
                </div>

                <div>
                    <h5>Tambah Staff / Anggota TechStore</h5>
                    <p>Masukkan informasi anggota tim dengan lengkap</p>
                </div>

            </div>

            <span class="tech-form-badge">
                <i class="fa-solid fa-users me-1"></i>
                TechStore Management
            </span>

        </div>


        {{-- BODY --}}
        <div class="tech-form-body">

            {{-- INFORMASI --}}
            <div class="form-info-box">
                <i class="fa-solid fa-circle-info"></i>

                <div>
                    <strong>Informasi Form</strong><br>
                    Silakan isi data staff dengan benar. Form ini masih dalam
                    tahap tampilan dan <strong>belum terhubung ke database</strong>.
                </div>
            </div>


            <form
                action="#"
                method="POST"
                onsubmit="event.preventDefault(); showSuccessMessage();"
            >

                {{-- DATA PRIBADI --}}
                <div class="form-section-title">
                    <i class="fa-solid fa-user"></i>
                    Data Pribadi
                </div>


                <div class="row">

                    {{-- Nama --}}
                    <div class="col-md-6 mb-4">

                        <label class="tech-form-label">
                            Nama Lengkap
                            <span class="required-mark">*</span>
                        </label>

                        <div class="tech-input-group">

                            <span class="tech-input-icon">
                                <i class="fa-solid fa-user"></i>
                            </span>

                            <input
                                type="text"
                                class="tech-form-control"
                                placeholder="Masukkan nama lengkap..."
                                required
                            >

                        </div>

                    </div>


                    {{-- Gender --}}
                    <div class="col-md-6 mb-4">

                        <label class="tech-form-label">
                            Jenis Kelamin
                            <span class="required-mark">*</span>
                        </label>

                        <select class="tech-form-select" required>

                            <option value="" selected disabled>
                                -- Pilih Jenis Kelamin --
                            </option>

                            <option value="L">
                                Laki-laki
                            </option>

                            <option value="P">
                                Perempuan
                            </option>

                        </select>

                    </div>


                    {{-- Email --}}
                    <div class="col-md-6 mb-4">

                        <label class="tech-form-label">
                            Email / Username
                            <span class="required-mark">*</span>
                        </label>

                        <div class="tech-input-group">

                            <span class="tech-input-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </span>

                            <input
                                type="email"
                                class="tech-form-control"
                                placeholder="staff@techstore.com"
                                required
                            >

                        </div>

                        <span class="form-hint">
                            Gunakan email yang masih aktif.
                        </span>

                    </div>


                    {{-- Nomor HP --}}
                    <div class="col-md-6 mb-4">

                        <label class="tech-form-label">
                            Nomor HP
                            <span class="required-mark">*</span>
                        </label>

                        <div class="tech-input-group">

                            <span class="tech-input-icon">
                                <i class="fa-solid fa-phone"></i>
                            </span>

                            <input
                                type="tel"
                                class="tech-form-control"
                                placeholder="08xxxxxxxxxx"
                                required
                            >

                        </div>

                    </div>

                </div>


                {{-- DATA PEKERJAAN --}}
                <div class="form-section-title mt-2">
                    <i class="fa-solid fa-briefcase"></i>
                    Informasi Pekerjaan
                </div>


                <div class="row">

                    {{-- Role --}}
                    <div class="col-md-6 mb-4">

                        <label class="tech-form-label">
                            Peran / Jabatan
                            <span class="required-mark">*</span>
                        </label>

                        <select class="tech-form-select" required>

                            <option value="" selected disabled>
                                -- Pilih Role --
                            </option>

                            <option value="admin">
                                Administrator Toko
                            </option>

                            <option value="inventory">
                                Staff Inventaris Gadget
                            </option>

                            <option value="kasir">
                                Kasir / Sales Staff
                            </option>

                            <option value="manager">
                                Manager Operasional
                            </option>

                        </select>

                    </div>


                    {{-- Status --}}
                    <div class="col-md-6 mb-4">

                        <label class="tech-form-label">
                            Status Staff
                            <span class="required-mark">*</span>
                        </label>

                        <select class="tech-form-select" required>

                            <option value="" selected disabled>
                                -- Pilih Status --
                            </option>

                            <option value="aktif">
                                Aktif
                            </option>

                            <option value="nonaktif">
                                Tidak Aktif
                            </option>

                            <option value="magang">
                                Magang
                            </option>

                        </select>

                    </div>

                </div>


                {{-- ALAMAT --}}
                <div class="form-section-title mt-2">
                    <i class="fa-solid fa-location-dot"></i>
                    Informasi Tambahan
                </div>


                <div class="row">

                    <div class="col-md-12 mb-4">

                        <label class="tech-form-label">
                            Alamat / Catatan
                        </label>

                        <textarea
                            class="tech-form-control"
                            rows="4"
                            placeholder="Masukkan alamat atau catatan tambahan..."
                        ></textarea>

                    </div>

                </div>


                {{-- BUTTON --}}
                <div class="tech-form-footer">

                    <button
                        type="reset"
                        class="btn btn-tech-reset"
                    >
                        <i class="fa-solid fa-rotate-left me-1"></i>
                        Reset
                    </button>

                    <button
                        type="submit"
                        class="btn btn-tech-save"
                    >
                        <i class="fa-solid fa-floppy-disk me-1"></i>
                        Simpan Data
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>
    function showSuccessMessage() {
        alert(
            "Form berhasil diisi!\\n\\n" +
            "Data belum disimpan ke database karena form ini masih dalam tahap tampilan."
        );
    }
</script>

@endsection