@extends('layouts.main')

@section('page_heading', 'Laporan Penjualan & Laba Rugi')

@section('content')

<!-- Form Filter Tanggal & Tombol Cetak -->
<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <form method="GET" action="{{ route('laporan.index') }}" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-bold">Dari Tanggal</label>
                <input type="date" name="tgl_mulai" class="form-control" value="{{ request('tgl_mulai') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">Sampai Tanggal</label>
                <input type="date" name="tgl_selesai" class="form-control" value="{{ request('tgl_selesai') }}">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary fw-bold flex-fill">
                    <i class="fa-solid fa-filter me-1"></i> Filter
                </button>
                <button type="button" onclick="window.print()" class="btn btn-secondary">
                    <i class="fa-solid fa-print me-1"></i> Cetak
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Card Summary Ringkasan Keuangan -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card bg-dark text-white shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase fw-bold mb-1">Total Transaksi</h6>
                        <h2 class="mb-0 fw-bold">{{ $totalTransaksi }}</h2>
                    </div>
                    <i class="fa-solid fa-receipt fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase fw-bold mb-1">Total Omset (Pendapatan)</h6>
                        <h2 class="mb-0 fw-bold">Rp {{ number_format($totalOmset, 0, ',', '.') }}</h2>
                    </div>
                    <i class="fa-solid fa-wallet fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-primary text-white shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase fw-bold mb-1">Total Laba Bersih (Keuntungan)</h6>
                        <h2 class="mb-0 fw-bold">Rp {{ number_format($totalLaba, 0, ',', '.') }}</h2>
                    </div>
                    <i class="fa-solid fa-chart-line fa-3x opacity-50"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Histori Transaksi -->
<div class="card card-outline card-dark">
    <div class="card-header">
        <h5 class="card-title mb-0 fw-bold"><i class="fa-solid fa-list me-1"></i> Riwayat Transaksi</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>No. Nota</th>
                        <th>Tanggal</th>
                        <th>Total Belanja</th>
                        <th>Bayar</th>
                        <th>Kembalian</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penjualans as $key => $p)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><span class="badge bg-secondary">{{ $p->no_nota }}</span></td>
                            <td>{{ $p->created_at->format('d/m/Y H:i') }}</td>
                            <td class="fw-bold text-success">Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($p->bayar, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($p->kembalian, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('laporan.show', $p->id) }}" class="btn btn-sm btn-info">
                                    <i class="fa-solid fa-eye me-1"></i> Detail Nota
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Belum ada riwayat transaksi penjualan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection