<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
<<<<<<< HEAD

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PenjualanController;
=======
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;

>>>>>>> 6c9686e34932432304104fb7c754ca7fb42ad2e0

Route::get('/', function () {
    return view('login');
})->name('login'); 

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
});
=======
>>>>>>> 6c9686e34932432304104fb7c754ca7fb42ad2e0

Route::get('/laporan', function () {
    return view('laporan');
});

Route::get('/form', function () {
    return view('form');
});


Route::match(['get', 'post'], '/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

<<<<<<< HEAD
Route::resource('category', CategoryController::class);
=======

>>>>>>> 6c9686e34932432304104fb7c754ca7fb42ad2e0
Route::resource('category', CategoryController::class);
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::get('/transaksi', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('/transaksi', [PenjualanController::class, 'store'])->name('penjualan.store');
<<<<<<< HEAD
=======
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
>>>>>>> 6c9686e34932432304104fb7c754ca7fb42ad2e0
