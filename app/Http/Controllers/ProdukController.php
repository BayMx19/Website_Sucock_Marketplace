<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('pembeli_produk');
    }
    public function show()
    {
        return view('pembeli_detailproduk');
    }

    public function dataproduk()
    {
        $produk = Produk::with('user')->get();
        // dd($produk);
        return view('admin.data_produk.index', compact('produk'));
    }
    public function dataprodukdetail($id)
    {
        $produk = Produk::with('user')->findOrFail($id);
        // dd($produk);
        return view('admin.data_produk.detail', compact('produk'));
    }
}
