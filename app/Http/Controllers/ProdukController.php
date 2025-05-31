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

    public function dataproduk(Request $request)
    {
        $search = $request->query('searchorders');

        if(empty($search)) {
            $produk = Produk::with('user')->get();
        } else {
            $produk = Produk::with('user')
              ->where(function ($query) use ($search) {
                $query->Where('nama_produk', 'like', "%{$search}%")
                    ->orWhere('harga', 'like', "%{$search}%")
                    ->orWhere('stok', 'like', "%{$search}%");
            })
            ->orWhereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->get();
        }

        return view('admin.data_produk.index', compact('produk', 'search'));
    }
    public function dataprodukdetail($id)
    {
        $produk = Produk::with('user')->findOrFail($id);
        // dd($produk);
        return view('admin.data_produk.detail', compact('produk'));
    }
}
