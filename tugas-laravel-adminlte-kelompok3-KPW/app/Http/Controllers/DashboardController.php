<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Penjualan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $todayDate = now()->toDateString();

        $totalProduk = Product::count();
        $totalTransaksiHariIni = Penjualan::whereDate('created_at', $todayDate)->count();
        $totalOmsetHariIni = Penjualan::whereDate('created_at', $todayDate)->sum('total_harga');
        
        $totalKasir = User::whereHas('role', function ($query) {
            $query->where('name', 'kasir');
        })->count();

        return view('dashboard', compact(
            'totalProduk', 
            'totalTransaksiHariIni', 
            'totalOmsetHariIni', 
            'totalKasir'
        ));
    }
}