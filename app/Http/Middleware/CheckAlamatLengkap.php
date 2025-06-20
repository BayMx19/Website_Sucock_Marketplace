<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAlamatLengkap
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

    // Jika belum login, lanjutkan (biar bisa akses publik)
    if (!$user) {
        return $next($request);
    }

    // Jika bukan Pembeli, lanjutkan
    if ($user->role !== 'Pembeli') {
        return $next($request);
    }

    // Abaikan jika sedang di halaman profil atau input alamat
    if ($request->is('profile*') || $request->is('pembeli/alamat/*') || $request->is('logout') || $request->is('profil/alamat-utama')) {
        return $next($request);
    }

    // Cek apakah user punya alamat utama
    $alamatUtama = $user->dataAlamat()->where('is_utama', true)->first();

    if (!$alamatUtama && $request->routeIs('pembeli.keranjang')) {
        return redirect()->route('pembeli.profile')
            ->with('warning_alamat', 'Silakan lengkapi alamat dan pilih alamat utama terlebih dahulu.');
    }

    return $next($request);
    }
}
