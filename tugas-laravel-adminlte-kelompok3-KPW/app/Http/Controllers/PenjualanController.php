<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    // Tampilan Halaman Kasir / Form Transaksi
    public function create()
    {
        $products = Product::where('stok', '>', 0)->get();
        
        // Generate Nomor Nota Otomatis (Format: NT-YYYYMMDD-0001)
        $today = date('Ymd');
        $lastPenjualan = Penjualan::whereDate('created_at', date('Y-m-d'))
                            ->orderBy('id', 'desc')
                            ->first();

        if ($lastPenjualan) {
            $lastNo = substr($lastPenjualan->no_nota, -4);
            $nextNo = sprintf('%04d', intval($lastNo) + 1);
        } else {
            $nextNo = '0001';
        }

        $noNota = 'NT-' . $today . '-' . $nextNo;

        return view('penjualan.create', compact('products', 'noNota'));
    }

    // Simpan Transaksi & Potong Stok
    public function store(Request $request)
    {
        $request->validate([
            'no_nota' => 'required',
            'bayar' => 'required|numeric',
            'cart' => 'required|array|min:1',
        ]);

        DB::beginTransaction();

        try {
            $totalHarga = 0;

            // Hitung Total Harga dari keranjang (cart)
            foreach ($request->cart as $item) {
                $product = Product::findOrFail($item['product_id']);
                
                // Cek ketersediaan stok
                if ($product->stok < $item['qty']) {
                    return redirect()->back()->with('error', "Stok untuk {$product->nama_produk} tidak mencukupi!");
                }

                $totalHarga += $product->harga_jual * $item['qty'];
            }

            // Validasi pembayaran
            if ($request->bayar < $totalHarga) {
                return redirect()->back()->with('error', 'Uang pembayaran kurang dari total belanja!');
            }

            $kembalian = $request->bayar - $totalHarga;

            // 1. Simpan Header Transaksi
            $penjualan = Penjualan::create([
                'no_nota' => $request->no_nota,
                'tanggal' => now(),
                'total_harga' => $totalHarga,
                'bayar' => $request->bayar,
                'kembalian' => $kembalian,
                'user_id' => auth()->id() ?? null,
            ]);

            // 2. Simpan Detail Transaksi & Kurangi Stok
            foreach ($request->cart as $item) {
                $product = Product::findOrFail($item['product_id']);

                DetailPenjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'product_id' => $product->id,
                    'qty' => $item['qty'],
                    'harga_beli' => $product->harga_beli,
                    'harga_jual' => $product->harga_jual,
                    'subtotal' => $product->harga_jual * $item['qty'],
                ]);

                // Potong stok produk
                $product->decrement('stok', $item['qty']);
            }

            DB::commit();

            return redirect()->route('penjualan.create')->with('success', "Transaksi berhasil disimpan! Kembalian: Rp " . number_format($kembalian, 0, ',', '.'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
