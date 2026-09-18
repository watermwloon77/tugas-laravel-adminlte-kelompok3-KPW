<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Filter berdasarkan rentang tanggal (opsional)
        $tglMulai = $request->input('tgl_mulai');
        $tglSelesai = $request->input('tgl_selesai');

        $query = Penjualan::with('details.product', 'user');

        if ($tglMulai) {
            $query->whereDate('created_at', '>=', $tglMulai);
        }
        if ($tglSelesai) {
            $query->whereDate('created_at', '<=', $tglSelesai);
        }

        // Ambil semua transaksi beserta detail item dan produknya
        $penjualans = $query->orderBy('created_at', 'desc')->get();

        // Hitung Total Transaksi
        $totalTransaksi = $penjualans->count();

        // Hitung Total Omset (Total Penjualan)
        $totalOmset = $penjualans->sum('total_harga');

        // Hitung Total Laba Bersih (margin harga_jual - harga_beli untuk setiap item)
        $totalLaba = 0;
        foreach ($penjualans as $penjualan) {
            foreach ($penjualan->details as $detail) {
                $margin = $detail->harga_jual - $detail->harga_beli;
                $totalLaba += $margin * $detail->qty;
            }
        }

        return view('laporan.index', compact('penjualans', 'totalTransaksi', 'totalOmset', 'totalLaba'));
    }

    public function show($id)
    {
        $penjualan = Penjualan::with('details.product', 'user')->findOrFail($id);

        // Hitung laba bersih per nota
        $totalLabaNota = 0;
        foreach ($penjualan->details as $detail) {
            $totalLabaNota += ($detail->harga_jual - $detail->harga_beli) * $detail->qty;
        }

        return view('laporan.show', compact('penjualan', 'totalLabaNota'));
    }
}