@extends('layouts.main')

@section('page_heading', 'Detail Nota Transaksi')

@section('content')
<div class="mb-3">
    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Laporan
    </a>
</div>

<div class="card card-dark">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0 fw-bold"><i class="fa-solid fa-receipt me-1"></i> Nota: {{ $penjualan->no_nota }}</h5>
        <span>Tanggal: {{ $penjualan->created_at->format('d F Y, H:i') }} WIB</span>
    </div>
    <div class="card-body">
        <div class="table-responsive mb-3">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Buket / Produk</th>
                        <th>Harga Jual</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penjualan->details as $index => $detail)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $detail->product->nama_produk ?? 'Produk Dihapus' }}</td>
                            <td>Rp {{ number_format($detail->harga_jual, 0, ',', '.') }}</td>
                            <td class="text-center">{{ $detail->qty }}</td>
                            <td class="text-end fw-bold">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="table-light">
                    <tr>
                        <th colspan="4" class="text-end fs-5">Total Belanja:</th>
                        <th class="text-end fs-5 text-success">Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}</th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-end">Nominal Bayar:</th>
                        <th class="text-end">Rp {{ number_format($penjualan->bayar, 0, ',', '.') }}</th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-end">Kembalian:</th>
                        <th class="text-end text-primary">Rp {{ number_format($penjualan->kembalian, 0, ',', '.') }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection