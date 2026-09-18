@extends('layouts.main')

@section('page_heading', 'Dashboard Florist POS')

@section('content')
<div class="row">
    {{-- Card Total Produk --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalProduk }}</h3>
                <p>Total Produk</p>
            </div>
            <div class="icon"><i class="fas fa-boxes"></i></div>
        </div>
    </div>

    {{-- Card Transaksi Hari Ini --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalTransaksiHariIni }}</h3>
                <p>Transaksi Hari Ini</p>
            </div>
            <div class="icon"><i class="fas fa-shopping-cart"></i></div>
        </div>
    </div>

    {{-- Card Omset Hari Ini --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>Rp {{ number_format($totalOmsetHariIni, 0, ',', '.') }}</h3>
                <p>Omset Hari Ini</p>
            </div>
            <div class="icon"><i class="fas fa-chart-line"></i></div>
        </div>
    </div>

    {{-- Card Total Kasir --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $totalKasir }}</h3>
                <p>Total Kasir</p>
            </div>
            <div class="icon"><i class="fas fa-user-tie"></i></div>
        </div>
    </div>
</div>

@if(in_array(strtolower(optional(auth()->user()->role)->name ?? ''), ['admin', 'owner']))
<div class="card card-primary shadow-sm mt-4">
    <div class="card-header">
        <h5 class="card-title mb-0 fw-bold"><i class="fa-solid fa-chart-simple me-1"></i> Ringkasan Sistem Kasir POS</h5>
    </div>
    <div class="card-body">
        Sistem Kasir POS & Manajemen Toko Buket ini digunakan untuk mengelola transaksi penjualan,
        stok produk, data kategori, serta laporan omset dan laba bersih toko.
    </div>
</div>
@endif
@endsection