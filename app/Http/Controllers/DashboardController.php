<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\review;
use App\Models\pesanan;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboardadmin() {
        $pengguna = User::get();
        $review = review::get();

        $total_pengguna = $pengguna->where('role', 'Pembeli')->count();
        // $total_pengguna = User::where('role', 'Pembeli')->count();
        $total_review = $review->count();
        $total_toko =  $pengguna->where('role', 'Penjual')->count();
        $total_produk = produk::count();

        $jml_pendapatan = pesanan::selectRaw("
            DATE_FORMAT(tanggal_pesanan, '%b %Y') as bulan,
            SUM(total_harga) as total
        ")
        ->where('status_pesanan', 'Sudah Dibayar')
        ->where('tanggal_pesanan', '>=', now()->subMonths(5)->startOfMonth())
        ->groupByRaw("DATE_FORMAT(tanggal_pesanan, '%b %Y')")
        ->orderByRaw("MIN(tanggal_pesanan)")
        ->get();

        $jml_rerata_review = collect(DB::select("
            SELECT users.name, ROUND(AVG(review.bintang), 1) AS rerata_bintang
            FROM review
            JOIN pesanan ON pesanan.id = review.pesanan_id
            JOIN users ON users.id = pesanan.user_id
            GROUP BY users.id, users.name
        "));

        return view('admin.home', compact('total_pengguna', 'total_review', 'total_toko', 'total_produk', 'jml_rerata_review', 'jml_pendapatan'));
    }

    public function dashboardpenjual(){
        return view('penjual.home');
    }
}
