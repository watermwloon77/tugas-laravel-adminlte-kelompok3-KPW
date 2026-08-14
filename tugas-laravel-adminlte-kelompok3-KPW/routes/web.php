<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



Route::get('/', function () {
    return view('login');
})->name('login'); 

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/users', function () {
    return view('users');
});

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