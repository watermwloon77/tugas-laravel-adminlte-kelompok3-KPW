@extends('layouts.main') 

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Dashboard Florist POS</h1>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
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
    </div>
</div>
@endsection