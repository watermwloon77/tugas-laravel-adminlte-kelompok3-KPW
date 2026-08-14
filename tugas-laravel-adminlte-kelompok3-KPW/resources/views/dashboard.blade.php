@extends('layouts.main')

@section('title', 'TechStore Admin - Dashboard')
@section('page_heading', 'Dashboard Overview')

@section('content')
<style>
    /* Custom Styling Tema Biru Tua & Biru Muda */
    .bg-gradient-navy {
        background: linear-gradient(135deg, #1e3a8a 0%, #0284c7 100%);
        color: white;
    }
    .bg-gradient-sky {
        background: linear-gradient(135deg, #0284c7 0%, #38bdf8 100%);
        color: white;
    }
    .card-theme-header {
        background-color: #ffffff;
        border-bottom: 2px solid #e2e8f0;
    }
    .text-theme-navy {
        color: #1e3a8a;
    }
    .text-theme-sky {
        color: #0284c7;
    }
</style>

<!-- ================= 1. CARDS INFO BOX (TEMA BIRU) ================= -->
<div class="row mb-4">
    <div class="col-lg-3 col-6">
        <div class="card bg-gradient-navy border-0 rounded-3 shadow-sm p-3 position-relative overflow-hidden">
            <div class="inner">
                <h3 class="fw-bold mb-1">1,240</h3>
                <p class="mb-0 fs-6 text-white-50">Pengunjung Toko</p>
            </div>
            <div class="icon position-absolute end-0 bottom-0 me-3 mb-2 opacity-25 fs-1">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="card bg-gradient-sky border-0 rounded-3 shadow-sm p-3 position-relative overflow-hidden text-white">
            <div class="inner">
                <h3 class="fw-bold mb-1">Rp 18.2M</h3>
                <p class="mb-0 fs-6 text-white-50">Total Penjualan</p>
            </div>
            <div class="icon position-absolute end-0 bottom-0 me-3 mb-2 opacity-25 fs-1">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="card bg-gradient-navy border-0 rounded-3 shadow-sm p-3 position-relative overflow-hidden">
            <div class="inner">
                <h3 class="fw-bold mb-1">85%</h3>
                <p class="mb-0 fs-6 text-white-50">Tingkat Konversi</p>
            </div>
            <div class="icon position-absolute end-0 bottom-0 me-3 mb-2 opacity-25 fs-1">
                <i class="fa-solid fa-chart-line"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="card bg-gradient-sky border-0 rounded-3 shadow-sm p-3 position-relative overflow-hidden text-white">
            <div class="inner">
                <h3 class="fw-bold mb-1">5 / 5</h3>
                <p class="mb-0 fs-6 text-white-50">Halaman Completed</p>
            </div>
            <div class="icon position-absolute end-0 bottom-0 me-3 mb-2 opacity-25 fs-1">
                <i class="fa-solid fa-check-double"></i>
            </div>
        </div>
    </div>
</div>

<!-- ================= 2. GRAFIK (DIKUNCI DAN TEMA BIRU) ================= -->
<div class="row">
    <!-- Chart 1: Visitors -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header card-theme-header d-flex justify-content-between align-items-center py-3">
                <h6 class="card-title fw-bold m-0 text-theme-navy">
                    <i class="fa-solid fa-chart-area text-theme-sky me-2"></i>Statistik Pengunjung
                </h6>
                <span class="badge bg-info-subtle text-info border border-info"><i class="fa-solid fa-arrow-up me-1"></i>12.5%</span>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-baseline mb-3">
                    <h2 class="fw-bold me-2 mb-0 text-theme-navy">820</h2>
                    <span class="text-muted small">Total Pengunjung Minggu Ini</span>
                </div>
                <!-- Div pembungkus agar grafik tidak memanjang kebawah -->
                <div style="position: relative; height: 230px; width: 100%;">
                    <canvas id="visitorsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart 2: Sales -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header card-theme-header d-flex justify-content-between align-items-center py-3">
                <h6 class="card-title fw-bold m-0 text-theme-navy">
                    <i class="fa-solid fa-chart-bar text-theme-sky me-2"></i>Performansi Penjualan
                </h6>
                <span class="badge bg-info-subtle text-info border border-info"><i class="fa-solid fa-arrow-up me-1"></i>33.1%</span>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-baseline mb-3">
                    <h2 class="fw-bold me-2 mb-0 text-theme-navy">Rp 18.230.000</h2>
                    <span class="text-muted small">Total Omset Bulan Ini</span>
                </div>
                <!-- Div pembungkus agar grafik tidak memanjang kebawah -->
                <div style="position: relative; height: 230px; width: 100%;">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================= 3. TABEL & PROGRESS KELOMPOK ================= -->
<div class="row">
    <!-- Tabel Produk Terlaris -->
    <div class="col-lg-7 mb-4">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header card-theme-header py-3">
                <h6 class="card-title fw-bold m-0 text-theme-navy">
                    <i class="fa-solid fa-bag-shopping text-theme-sky me-2"></i>Produk Terlaris TechStore
                </h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Produk Gadget</th>
                                <th>Harga</th>
                                <th>Terjual</th>
                                <th>Status Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary-subtle text-primary rounded-circle p-2 me-2 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                            <i class="fa-solid fa-laptop"></i>
                                        </div>
                                        <span class="fw-bold text-dark">Laptop ASUS ROG</span>
                                    </div>
                                </td>
                                <td>Rp 15.000.000</td>
                                <td><span class="text-success fw-bold"><i class="fa-solid fa-arrow-up me-1"></i>12%</span> 1,200 Unit</td>
                                <td><span class="badge bg-success">Tersedia</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-info-subtle text-info rounded-circle p-2 me-2 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                            <i class="fa-solid fa-mobile-screen"></i>
                                        </div>
                                        <span class="fw-bold text-dark">Smartphone Pro Max</span>
                                    </div>
                                </td>
                                <td>Rp 8.500.000</td>
                                <td><span class="text-danger fw-bold"><i class="fa-solid fa-arrow-down me-1"></i>0.5%</span> 850 Unit</td>
                                <td><span class="badge bg-warning text-dark">Pre-Order</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary-subtle text-primary rounded-circle p-2 me-2 d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                            <i class="fa-solid fa-headphones"></i>
                                        </div>
                                        <span class="fw-bold text-dark">Headset Wireless Gaming</span>
                                    </div>
                                </td>
                                <td>Rp 1.200.000</td>
                                <td><span class="text-success fw-bold"><i class="fa-solid fa-arrow-up me-1"></i>25%</span> 430 Unit</td>
                                <td><span class="badge bg-success">Tersedia</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress Pengerjaan Tugas -->
    <div class="col-lg-5 mb-4">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header card-theme-header py-3">
                <h6 class="card-title fw-bold m-0 text-theme-navy">
                    <i class="fa-solid fa-list-check text-theme-sky me-2"></i>Progress Sistem Kelompok 3
                </h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small fw-bold">1. Halaman Login</span>
                        <span class="small text-primary fw-bold">100%</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar style="width: 100%; background-color: #0284c7;"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small fw-bold">2. Halaman Dashboard</span>
                        <span class="small text-primary fw-bold">100%</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar" style="width: 100%; background-color: #0284c7;"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small fw-bold">3. Halaman Data User / Profile</span>
                        <span class="small text-primary fw-bold">80%</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar" style="width: 80%; background-color: #1e3a8a;"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small fw-bold">4. Halaman Tabel Laporan Data</span>
                        <span class="small text-primary fw-bold">90%</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar" style="width: 90%; background-color: #1e3a8a;"></div>
                    </div>
                </div>
                <div class="mb-1">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small fw-bold">5. Halaman Form Input Data</span>
                        <span class="small text-primary fw-bold">85%</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar" style="width: 85%; background-color: #1e3a8a;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<!-- Script ChartJS versi CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // 1. Grafik Line (Visitors) - Warna Biru Tua & Muda
        const ctxVisitors = document.getElementById('visitorsChart');
        if (ctxVisitors) {
            new Chart(ctxVisitors, {
                type: 'line',
                data: {
                    labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
                    datasets: [
                        {
                            label: 'Minggu Ini',
                            data: [100, 120, 170, 165, 180, 175, 160],
                            borderColor: '#0284c7', // Biru Muda
                            backgroundColor: 'rgba(2, 132, 199, 0.15)',
                            borderWidth: 3,
                            tension: 0.3,
                            fill: true
                        },
                        {
                            label: 'Minggu Lalu',
                            data: [60, 80, 70, 68, 80, 78, 100],
                            borderColor: '#94a3b8',
                            borderDash: [5, 5],
                            borderWidth: 2,
                            tension: 0.3,
                            fill: false
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        }

        // 2. Grafik Bar (Sales) - Warna Biru Tua & Muda
        const ctxSales = document.getElementById('salesChart');
        if (ctxSales) {
            new Chart(ctxSales, {
                type: 'bar',
                data: {
                    labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                    datasets: [
                        {
                            label: 'Tahun Ini',
                            data: [1000, 2000, 3000, 2500, 2700, 2500, 3000],
                            backgroundColor: '#1e3a8a', // Biru Tua Navy
                            borderRadius: 4
                        },
                        {
                            label: 'Tahun Lalu',
                            data: [700, 1700, 2700, 2000, 1800, 1500, 2200],
                            backgroundColor: '#38bdf8', // Biru Cerah
                            borderRadius: 4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
        }
    });
</script>
@endpush