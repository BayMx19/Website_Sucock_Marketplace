<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\review;
use App\Models\pesanan;
use App\Models\produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            JOIN users ON users.id = pesanan.pembeli_id
            GROUP BY users.id, users.name
        "));

        return view('admin.home', compact('total_pengguna', 'total_review', 'total_toko', 'total_produk', 'jml_rerata_review', 'jml_pendapatan'));
    }

    public function dashboardpenjual(){
        $saldo_penjual = pesanan::selectRaw("
            SUM(total_harga) as saldo
        ")
        ->join('keranjang', 'keranjang.id', '=', 'pesanan.keranjang_id')
        ->join('produk', 'produk.id', '=', 'keranjang.produk_id')
        ->where('penjual_id', Auth::id())
        ->where('status_pesanan', 'Selesai')
        ->first();

        $saldo = $saldo_penjual->saldo ?? 0;

        $jmlProduk = produk::where('penjual_id', Auth::id())->count();

        $pesananSelesai = pesanan::join('keranjang', 'keranjang.id', '=', 'pesanan.keranjang_id')
        ->join('produk', 'produk.id', '=', 'keranjang.produk_id')
        ->where('penjual_id', Auth::id())
        ->where('status_pesanan', 'Selesai')
        ->count();

        $pesananBelum = pesanan::join('keranjang', 'keranjang.id', '=', 'pesanan.keranjang_id')
        ->join('produk', 'produk.id', '=', 'keranjang.produk_id')
        ->where('penjual_id', Auth::id())
        ->whereIn('status_pesanan', ['Diproses', 'Dikirim'])
        ->count();

        $jml_pendapatan_penjual = pesanan::selectRaw("
            DATE_FORMAT(tanggal_pesanan, '%b %Y') as bulan,
            SUM(total_harga) as total
        ")
        ->join('keranjang', 'keranjang.id', '=', 'pesanan.keranjang_id')
        ->join('produk', 'produk.id', '=', 'keranjang.produk_id')
        ->where('penjual_id', Auth::id())
        ->where('status_pesanan', 'Selesai')
        ->where('tanggal_pesanan', '>=', now()->subMonths(5)->startOfMonth())
        ->groupByRaw("DATE_FORMAT(tanggal_pesanan, '%b %Y')")
        ->orderByRaw("MIN(tanggal_pesanan)")
        ->get();

        dd($jml_pendapatan_penjual);

        return view('penjual.home', compact('saldo', 'jmlProduk', 'pesananSelesai', 'pesananBelum'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboardpembeli(){
        $list_produk = produk::with('user')->limit(5)->get();
        $list_toko = Toko::where('role', 'Penjual')->get();
        
        return view ('pembeli.home', compact('list_toko', 'list_produk'));
    }
}
