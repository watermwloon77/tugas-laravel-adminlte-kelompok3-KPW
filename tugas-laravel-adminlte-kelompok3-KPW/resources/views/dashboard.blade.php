@extends('adminlte::page')

@section('title', 'Dashboard Overview')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 font-weight-bold" style="color: #f39c12;">Dashboard Overview</h1>
        <span class="badge elevation-1 p-2" style="background-color: #f39c12; color: #1e2b37; font-weight: 700;">
            <i class="fas fa-crown mr-1"></i> PJ Dashboard: Iin
        </span>
    </div>
@endsection

@section('content')
    <!-- 1. STATS BOXES (Tema Amber / Warning) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box elevation-3" style="background-color: #f39c12; color: #fff;">
                <div class="inner">
                    <h3 class="font-weight-bold" style="color: #fff;">1,240</h3>
                    <p style="color: #fff; font-weight: 500;">Pengunjung Toko</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users" style="color: rgba(255,255,255,0.4);"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box elevation-3" style="background-color: #d35400; color: #fff;">
                <div class="inner">
                    <h3 class="font-weight-bold" style="color: #fff;">Rp 18.2M</h3>
                    <p style="color: #fff; font-weight: 500;">Total Penjualan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart" style="color: rgba(255,255,255,0.4);"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box elevation-3" style="background-color: #f39c12; color: #fff;">
                <div class="inner">
                    <h3 class="font-weight-bold" style="color: #fff;">85%</h3>
                    <p style="color: #fff; font-weight: 500;">Tingkat Konversi</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-line" style="color: rgba(255,255,255,0.4);"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box elevation-3" style="background-color: #d35400; color: #fff;">
                <div class="inner">
                    <h3 class="font-weight-bold" style="color: #fff;">5 / 5</h3>
                    <p style="color: #fff; font-weight: 500;">Halaman Completed</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle" style="color: rgba(255,255,255,0.4);"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. GRAFIK / CHART UTAMA (Amber Theme) -->
    <div class="row">
        <!-- Chart 1: Statistik Pengunjung -->
        <div class="col-md-6">
            <div class="card elevation-3" style="background-color: #1e2b37; color: #fff; border-top: 3px solid #f39c12;">
                <div class="card-header border-0 bg-transparent d-flex justify-content-between align-items-center">
                    <h3 class="card-title font-weight-bold" style="color: #f39c12;">
                        <i class="fas fa-chart-area mr-2"></i>Statistik Pengunjung
                    </h3>
                    <span class="badge bg-success"><i class="fas fa-arrow-up"></i> 12.3%</span>
                </div>
                <div class="card-body">
                    <h2 class="font-weight-bold" style="color: #fff;">820 <small class="text-muted" style="font-size:14px;">Total Pengunjung Minggu Ini</small></h2>
                    <canvas id="visitorChart" style="min-height: 220px; height: 220px; max-height: 220px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>

        <!-- Chart 2: Performansi Penjualan -->
        <div class="col-md-6">
            <div class="card elevation-3" style="background-color: #1e2b37; color: #fff; border-top: 3px solid #f39c12;">
                <div class="card-header border-0 bg-transparent d-flex justify-content-between align-items-center">
                    <h3 class="card-title font-weight-bold" style="color: #f39c12;">
                        <i class="fas fa-chart-bar mr-2"></i>Performansi Penjualan
                    </h3>
                    <span class="badge bg-success"><i class="fas fa-arrow-up"></i> 33.1%</span>
                </div>
                <div class="card-body">
                    <h2 class="font-weight-bold" style="color: #fff;">Rp 18.230.000 <small class="text-muted" style="font-size:14px;">Total Omset Bulan Ini</small></h2>
                    <canvas id="salesChart" style="min-height: 220px; height: 220px; max-height: 220px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.body.classList.add('dark-mode');

        // Chart 1: Line Chart (Amber / Kuning)
        const ctxVisitor = document.getElementById('visitorChart').getContext('2d');
        
        // Gradient Effect biar mewah
        let gradientVisitor = ctxVisitor.createLinearGradient(0, 0, 0, 200);
        gradientVisitor.addColorStop(0, 'rgba(243, 156, 18, 0.5)');
        gradientVisitor.addColorStop(1, 'rgba(243, 156, 18, 0.0)');

        new Chart(ctxVisitor, {
            type: 'line',
            data: {
                labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
                datasets: [{
                    label: 'Minggu Ini',
                    data: [100, 120, 170, 160, 180, 170, 150],
                    borderColor: '#f39c12',
                    borderWidth: 3,
                    backgroundColor: gradientVisitor,
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Minggu Lalu',
                    data: [60, 80, 75, 65, 80, 78, 90],
                    borderColor: '#7f8c8d',
                    borderDash: [5, 5],
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: { 
                responsive: true, 
                maintainAspectRatio: false,
                plugins: {
                    legend: { labels: { color: '#ccc' } }
                },
                scales: {
                    x: { ticks: { color: '#888' }, grid: { color: '#2c3e50' } },
                    y: { ticks: { color: '#888' }, grid: { color: '#2c3e50' } }
                }
            }
        });

        // Chart 2: Bar Chart (Amber Gold & Dark Amber)
        const ctxSales = document.getElementById('salesChart').getContext('2d');
        new Chart(ctxSales, {
            type: 'bar',
            data: {
                labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [{
                    label: 'Tahun Ini',
                    data: [10, 18, 28, 25, 20, 24, 28],
                    backgroundColor: '#f39c12',
                    borderRadius: 4
                }, {
                    label: 'Tahun Lalu',
                    data: [7, 14, 24, 20, 15, 18, 22],
                    backgroundColor: '#d35400',
                    borderRadius: 4
                }]
            },
            options: { 
                responsive: true, 
                maintainAspectRatio: false,
                plugins: {
                    legend: { labels: { color: '#ccc' } }
                },
                scales: {
                    x: { ticks: { color: '#888' }, grid: { color: '#2c3e50' } },
                    y: { ticks: { color: '#888' }, grid: { color: '#2c3e50' } }
                }
            }
        });
    </script>
@endsection