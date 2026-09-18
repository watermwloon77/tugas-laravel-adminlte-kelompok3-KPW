<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman tersebut!');
        }

        $user = Auth::user();
        // Mengambil nama role user (kolom 'name' pada tabel roles)
        $userRole = strtolower(optional($user->role)->name ?? '');

        // Cek apakah role user ada di dalam daftar role yang diizinkan
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Jika tidak punya akses, kembalikan ke halaman sebelumnya dengan pesan error
        return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman tersebut!');
    }
}