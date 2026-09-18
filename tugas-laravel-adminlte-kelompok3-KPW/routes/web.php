<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;

// ==========================================
// 1. PUBLIC ROUTES (GUEST / BEBAS AKSES)
// ==========================================

// Tampilan Halaman Login
Route::get('/', function () {
    return view('login');
})->name('login');

// Redirect /login ke halaman utama
Route::get('/login', function () {
    return redirect()->route('login');
});

// Proses Submit Form Login
$loginHandler = function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
        
        $user = Auth::user();
        $roleName = strtolower($user->role->nama ?? $user->role->name ?? '');

        // Redirect berdasarkan role
        if ($roleName === 'kasir') {
            return redirect()->route('penjualan.create');
        }

        if ($roleName === 'owner') {
            return redirect()->route('laporan.index');
        }

        return redirect()->route('dashboard');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
};

Route::post('/', $loginHandler);
Route::post('/login', $loginHandler);


// ==========================================
// 2. PROTECTED ROUTES (WAJIB LOGIN)
// ==========================================
Route::middleware(['auth'])->group(function () {

    // Logout Route
    Route::match(['get', 'post'], '/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');


    // --------------------------------------
    // A. KHUSUS ADMIN
    // --------------------------------------
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('users', UserController::class)->except(['show']);
        Route::resource('category', CategoryController::class);
    });


    // --------------------------------------
    // B. ADMIN & OWNER (Dashboard & Laporan)
    // --------------------------------------
    Route::middleware(['role:admin,owner'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');
    });


    // --------------------------------------
    // C. ADMIN & KASIR (POS/Transaksi & Produk)
    // --------------------------------------
    Route::middleware(['role:admin,kasir'])->group(function () {
        Route::resource('products', ProductController::class)->except(['show']);

        // POS / Transaksi Penjualan
        Route::get('/transaksi', [PenjualanController::class, 'create'])->name('penjualan.create');
        Route::post('/transaksi', [PenjualanController::class, 'store'])->name('penjualan.store');
    });

});