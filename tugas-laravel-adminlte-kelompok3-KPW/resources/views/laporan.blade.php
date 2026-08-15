@extends('layouts.main')

@section('title', 'TechStore Admin - Laporan Penjualan')
@section('page_heading', 'Laporan Penjualan / Data')

@section('content')
<style>
    /* Custom Styling Tema Biru Tua & Biru Muda */
    .bg-gradient-blue {
        background: linear-gradient(135deg, #1e3a8a 0%, #0284c7 100%);
    }
    .text-theme-navy {
        color: #1e3a8a;
    }
    .text-theme-sky {
        color: #0284c7;
    }
    .btn-blue-primary {
        background: linear-gradient(90deg, #0284c7 0%, #1d4ed8 100%);
        border: none;
        color: #ffffff;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .btn-blue-primary:hover {
        background: linear-gradient(90deg, #0369a1 0%, #1e40af 100%);
        color: #ffffff;
        box-shadow: 0 4px 12px rgba(2, 132, 199, 0.3);
    }
    .badge-paid {
        background-color: #dcfce7;
        color: #15803d;
        border: 1px solid #bbf7d0;
        padding: 6px 12px;
        border-radius: 20px;
    }
    .badge-pending {
        background-color: #fef9c3;
        color: #a16207;
        border: 1px solid #fef08a;
        padding: 6px 12px;
        border-radius: 20px;
    }
    .stat-card {
        border-left: 4px solid #0284c7;
        transition: transform 0.2s ease;
    }
    .stat-card:hover {
        transform: translateY(-2px);
    }
    .stat-card.success {
        border-left-color: #10b981;
    }
    .stat-card.warning {
        border-left-color: #f59e0b;
    }
</style>

<!-- Header Bar Proyek -->
<div class="row mb-4 align-items-center">
    <div class="col-md-7">
        <h3 class="fw-bold text-theme-navy mb-1">
            <i class="fa-solid fa-file-invoice-dollar me-2 text-theme-sky"></i>Laporan Penjualan
        </h3>
        <p class="text-muted small mb-0">Kelola dan pantau seluruh histori transaksi penjualan TechStore dalam satu panel.</p>
    </div>
    <div class="col-md-5 text-md-end mt-3 mt-md-0">
        <button class="btn btn-outline-danger btn-sm fw-semibold me-2 shadow-sm" onclick="alert('Export PDF Berhasil!')">
            <i class="fa-solid fa-file-pdf me-1"></i> Export PDF
        </button>
        <button class="btn btn-outline-success btn-sm fw-semibold shadow-sm" onclick="alert('Export Excel Berhasil!')">
            <i class="fa-solid fa-file-excel me-1"></i> Export Excel
        </button>
    </div>
</div>

<!-- Grid Utama: Kartu Ringkasan (Atas) -->
<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3 p-3 bg-white stat-card">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Total Transaksi</span>
                    <h4 class="fw-bold text-theme-navy mb-0 mt-1">154</h4>
                </div>
                <div class="rounded-3 p-3" style="background-color: #e0f2fe; color: #0284c7;">
                    <i class="fa-solid fa-basket-shopping fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3 p-3 bg-white stat-card success">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Total Pendapatan</span>
                    <h4 class="fw-bold text-success mb-0 mt-1">Rp 48.950.000</h4>
                </div>
                <div class="rounded-3 p-3" style="background-color: #dcfce7; color: #15803d;">
                    <i class="fa-solid fa-wallet fs-4"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-3 p-3 bg-white stat-card warning">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold text-uppercase">Pending Payment</span>
                    <h4 class="fw-bold text-warning mb-0 mt-1">3 Transaksi</h4>
                </div>
                <div class="rounded-3 p-3" style="background-color: #fef9c3; color: #a16207;">
                    <i class="fa-solid fa-clock-rotate-left fs-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Layout 2 Kolom: Filter (Kiri) & Tabel (Kanan) -->
<div class="row g-4">
    <!-- Panel Filter (Side Panel) -->
    <div class="col-lg-3">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-header bg-gradient-blue text-white rounded-top p-3">
                <h6 class="m-0 fw-bold"><i class="fa-solid fa-filter me-2"></i>Filter Laporan</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Cari Faktur / Produk</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                            <input type="text" class="form-control" placeholder="No. Faktur / Produk...">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Dari Tanggal</label>
                        <input type="date" class="form-control form-control-sm" value="2026-08-01">
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-secondary">Sampai Tanggal</label>
                        <input type="date" class="form-control form-control-sm" value="2026-08-14">
                    </div>
                    <button type="button" class="btn btn-blue-primary btn-sm w-100 py-2">
                        <i class="fa-solid fa-sliders me-1"></i> Terapkan Filter
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Panel Tabel (Main Area) -->
    <div class="col-lg-9">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead style="background-color: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                            <tr class="text-secondary small text-uppercase">
                                <th class="ps-3 py-3">No. Faktur</th>
                                <th>Tanggal</th>
                                <th>Nama Pembeli</th>
                                <th>Item Gadget</th>
                                <th>Total Bayar</th>
                                <th>Metode</th>
                                <th>Status</th>
                                <th class="text-end pe-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-3 fw-bold text-theme-navy">#TRX-20260801</td>
                                <td class="small">14 Aug 2026</td>
                                <td class="fw-semibold">Budi Santoso</td>
                                <td><span class="badge bg-light text-dark border">Laptop ASUS ROG (1x)</span></td>
                                <td class="fw-bold text-theme-navy">Rp 15.000.000</td>
                                <td class="small">Transfer Bank</td>
                                <td><span class="badge badge-paid">Lunas</span></td>
                                <td class="text-end pe-3">
                                    <button class="btn btn-sm btn-light border text-primary" title="Cetak Struk"><i class="fa-solid fa-print"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3 fw-bold text-theme-navy">#TRX-20260802</td>
                                <td class="small">13 Aug 2026</td>
                                <td class="fw-semibold">Siti Aminah</td>
                                <td><span class="badge bg-light text-dark border">Smartphone Pro Max (1x)</span></td>
                                <td class="fw-bold text-theme-navy">Rp 8.500.000</td>
                                <td class="small">QRIS</td>
                                <td><span class="badge badge-paid">Lunas</span></td>
                                <td class="text-end pe-3">
                                    <button class="btn btn-sm btn-light border text-primary" title="Cetak Struk"><i class="fa-solid fa-print"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3 fw-bold text-theme-navy">#TRX-20260803</td>
                                <td class="small">12 Aug 2026</td>
                                <td class="fw-semibold">Rizky Febrian</td>
                                <td><span class="badge bg-light text-dark border">Headset Wireless (2x)</span></td>
                                <td class="fw-bold text-theme-navy">Rp 2.400.000</td>
                                <td class="small">Tunai / Cash</td>
                                <td><span class="badge badge-paid">Lunas</span></td>
                                <td class="text-end pe-3">
                                    <button class="btn btn-sm btn-light border text-primary" title="Cetak Struk"><i class="fa-solid fa-print"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-3 fw-bold text-theme-navy">#TRX-20260804</td>
                                <td class="small">11 Aug 2026</td>
                                <td class="fw-semibold">Dewi Kartika</td>
                                <td><span class="badge bg-light text-dark border">Monitor Gaming 27" (1x)</span></td>
                                <td class="fw-bold text-theme-navy">Rp 4.250.000</td>
                                <td class="small">Transfer Bank</td>
                                <td><span class="badge badge-pending">Menunggu Bayar</span></td>
                                <td class="text-end pe-3">
                                    <button class="btn btn-sm btn-light border text-primary" title="Cetak Struk"><i class="fa-solid fa-print"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Footer Pagination -->
                <div class="d-flex justify-content-between align-items-center p-3 border-top bg-light">
                    <span class="small text-muted">Menampilkan 1 - 4 dari 154 data laporan</span>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" style="background-color: #0284c7; border-color: #0284c7;" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection