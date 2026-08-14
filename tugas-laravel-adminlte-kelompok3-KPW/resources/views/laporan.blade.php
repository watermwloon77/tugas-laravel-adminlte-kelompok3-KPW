@extends('layouts.main')

@section('title', 'TechStore Admin - Laporan Penjualan')
@section('page_heading', 'Laporan Penjualan / Data')

@section('content')
<style>
    /* Custom Styling Tema Biru Tua & Biru Muda */
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
    .btn-blue-primary {
        background: linear-gradient(90deg, #0284c7 0%, #1d4ed8 100%);
        border: none;
        color: #ffffff;
        font-weight: 600;
        border-radius: 8px;
        padding: 8px 16px;
        transition: all 0.3s ease;
    }
    .btn-blue-primary:hover {
        background: linear-gradient(90deg, #0369a1 0%, #1e40af 100%);
        color: #ffffff;
        box-shadow: 0 4px 10px rgba(2, 132, 199, 0.3);
    }
    .btn-outline-custom {
        border: 1.5px solid #0284c7;
        color: #0284c7;
        font-weight: 600;
        border-radius: 8px;
        padding: 8px 16px;
    }
    .btn-outline-custom:hover {
        background-color: #0284c7;
        color: #ffffff;
    }
    .badge-paid {
        background-color: #dcfce7;
        color: #15803d;
        border: 1px solid #bbf7d0;
    }
    .badge-pending {
        background-color: #fef9c3;
        color: #a16207;
        border: 1px solid #fef08a;
    }
</style>

<!-- Banner Header Ringkasan Laporan -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-3 p-4" style="background: linear-gradient(135deg, #1e3a8a 0%, #0284c7 100%); color: white;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="fw-bold mb-1"><i class="fa-solid fa-file-invoice-dollar me-2"></i>Laporan Transaksi Penjualan TechStore</h4>
                    <p class="mb-0 text-white-50 small">Rekapitulasi data transaksi, status pembayaran gadget, dan riwayat penjualan produk.</p>
                </div>
                <div class="d-none d-md-block opacity-50 fs-1 me-3">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Widget Ringkasan Angka (Summary Cards) -->
<div class="row mb-4">
    <div class="col-md-4 mb-2">
        <div class="card border-0 shadow-sm rounded-3 p-3 bg-white">
            <div class="d-flex align-items-center">
                <div class="rounded-circle p-3 me-3" style="background-color: #e0f2fe; color: #0284c7;">
                    <i class="fa-solid fa-basket-shopping fs-4"></i>
                </div>
                <div>
                    <span class="text-muted small fw-semibold">Total Transaksi</span>
                    <h5 class="fw-bold text-theme-navy mb-0">154 Transaksi</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card border-0 shadow-sm rounded-3 p-3 bg-white">
            <div class="d-flex align-items-center">
                <div class="rounded-circle p-3 me-3" style="background-color: #dcfce7; color: #15803d;">
                    <i class="fa-solid fa-wallet fs-4"></i>
                </div>
                <div>
                    <span class="text-muted small fw-semibold">Total Pendapatan</span>
                    <h5 class="fw-bold text-success mb-0">Rp 48.950.000</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
        <div class="card border-0 shadow-sm rounded-3 p-3 bg-white">
            <div class="d-flex align-items-center">
                <div class="rounded-circle p-3 me-3" style="background-color: #fef9c3; color: #a16207;">
                    <i class="fa-solid fa-clock-rotate-left fs-4"></i>
                </div>
                <div>
                    <span class="text-muted small fw-semibold">Pending Payment</span>
                    <h5 class="fw-bold text-warning mb-0">3 Transaksi</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Table Card & Filter -->
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-3">
            <!-- Header Card & Filter Bar -->
            <div class="card-header card-theme-header d-flex flex-wrap align-items-center justify-content-between gap-2">
                <h6 class="m-0 fw-bold fs-6"><i class="fa-solid fa-table-list me-2"></i>Data Laporan Penjualan</h6>
                
                <div class="d-flex gap-2">
                    <button class="btn btn-sm btn-light text-theme-navy fw-semibold" onclick="alert('Export PDF Berhasil!')">
                        <i class="fa-solid fa-file-pdf text-danger me-1"></i> Export PDF
                    </button>
                    <button class="btn btn-sm btn-light text-theme-navy fw-semibold" onclick="alert('Export Excel Berhasil!')">
                        <i class="fa-solid fa-file-excel text-success me-1"></i> Export Excel
                    </button>
                </div>
            </div>

            <div class="card-body">
                <!-- Filter Tanggal & Pencarian -->
                <div class="row g-2 mb-4">
                    <div class="col-md-3">
                        <label class="form-label small fw-semibold">Dari Tanggal</label>
                        <input type="date" class="form-control form-control-sm" value="2026-08-01">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-semibold">Sampai Tanggal</label>
                        <input type="date" class="form-control form-control-sm" value="2026-08-14">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">Cari Transaksi / Produk</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Ketik No. Faktur atau Nama Produk...">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button class="btn btn-blue-primary btn-sm w-100">
                            <i class="fa-solid fa-filter me-1"></i> Filter Data
                        </button>
                    </div>
                </div>

                <!-- Tabel Data Transaksi -->
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>No. Faktur</th>
                                <th>Tanggal</th>
                                <th>Nama Pembeli</th>
                                <th>Item Gadget</th>
                                <th>Total Bayar</th>
                                <th>Metode</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold text-theme-navy">#TRX-20260801</td>
                                <td>14 Aug 2026</td>
                                <td>Budi Santoso</td>
                                <td>Laptop ASUS ROG (1x)</td>
                                <td class="fw-bold">Rp 15.000.000</td>
                                <td>Transfer Bank</td>
                                <td><span class="badge badge-paid">Lunas</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-light border text-primary" title="Cetak Struk"><i class="fa-solid fa-print"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-theme-navy">#TRX-20260802</td>
                                <td>13 Aug 2026</td>
                                <td>Siti Aminah</td>
                                <td>Smartphone Pro Max (1x)</td>
                                <td class="fw-bold">Rp 8.500.000</td>
                                <td>QRIS</td>
                                <td><span class="badge badge-paid">Lunas</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-light border text-primary" title="Cetak Struk"><i class="fa-solid fa-print"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-theme-navy">#TRX-20260803</td>
                                <td>12 Aug 2026</td>
                                <td>Rizky Febrian</td>
                                <td>Headset Wireless Gaming (2x)</td>
                                <td class="fw-bold">Rp 2.400.000</td>
                                <td>Tunai / Cash</td>
                                <td><span class="badge badge-paid">Lunas</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-light border text-primary" title="Cetak Struk"><i class="fa-solid fa-print"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold text-theme-navy">#TRX-20260804</td>
                                <td>11 Aug 2026</td>
                                <td>Dewi Kartika</td>
                                <td>Monitor Gaming 27 Inch (1x)</td>
                                <td class="fw-bold">Rp 4.250.000</td>
                                <td>Transfer Bank</td>
                                <td><span class="badge badge-pending">Menunggu Bayar</span></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-light border text-primary" title="Cetak Struk"><i class="fa-solid fa-print"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Footer -->
                <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
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