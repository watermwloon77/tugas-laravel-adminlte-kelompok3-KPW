<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        // Ambil semua transaksi beserta detail item dan produknya
        $penjualans = Penjualan::with('details.product', 'user')
                        ->orderBy('created_at', 'desc')
                        ->get();

        // Hitung Total Omset (Total Penjualan)
        $totalOmset = $penjualans->sum('total_harga');

        // Hitung Total Laba Bersih (Sistem menghitung margin harga_jual - harga_beli untuk setiap item)
        $totalLaba = 0;
        foreach ($penjualans as $penjualan) {
            foreach ($penjualan->details as $detail) {
                $margin = $detail->harga_jual - $detail->harga_beli;
                $totalLaba += $margin * $detail->qty;
            }
        }

        return view('laporan.index', compact('penjualans', 'totalOmset', 'totalLaba'));
    }

    public function show($id)
    {
        $penjualan = Penjualan::with('details.product', 'user')->findOrFail($id);
        return view('laporan.show', compact('penjualan'));
    }
}