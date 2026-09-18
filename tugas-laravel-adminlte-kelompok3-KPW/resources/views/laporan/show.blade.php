@extends('layouts.main')

@section('page_heading', 'Detail Nota Transaksi')

@section('content')
<div class="mb-3">
    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Laporan
    </a>
</div>

<div class="card card-primary shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="fa-solid fa-receipt me-1"></i> Nota: {{ $penjualan->no_nota }}</h5>
        <span class="small opacity-75">{{ $penjualan->created_at->format('d F Y, H:i') }} WIB</span>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <strong>Ditangani oleh:</strong> {{ optional($penjualan->user)->name ?? 'Kasir tidak diketahui' }}<br>
                <strong>Tanggal:</strong> {{ $penjualan->created_at->format('d F Y, H:i') }} WIB
            </div>
            <div class="col-md-6 text-md-end">
                <span class="badge bg-success p-2">Laba Bersih Nota: Rp {{ number_format($totalLabaNota, 0, ',', '.') }}</span>
            </div>
        </div>
        <div class="table-responsive mb-3">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Buket / Produk</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Subtotal</th>
                        <th class="text-end">Laba</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualan->details as $index => $detail)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $detail->product->nama_produk ?? 'Produk Dihapus' }}</td>
                            <td>Rp {{ number_format($detail->harga_beli, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($detail->harga_jual, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $detail->qty }}</td>
                            <td class="text-end fw-bold">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                            <td class="text-end text-success">Rp {{ number_format(($detail->harga_jual - $detail->harga_beli) * $detail->qty, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <th colspan="5" class="text-end fs-5">Total Belanja:</th>
                        <th class="text-end fs-5 text-success">Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th colspan="5" class="text-end">Nominal Bayar:</th>
                        <th class="text-end">Rp {{ number_format($penjualan->bayar, 0, ',', '.') }}</th>
                        <th></th>
                    </tr>
                    <tr>
                        <th colspan="5" class="text-end">Kembalian:</th>
                        <th class="text-end text-primary">Rp {{ number_format($penjualan->kembalian, 0, ',', '.') }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection