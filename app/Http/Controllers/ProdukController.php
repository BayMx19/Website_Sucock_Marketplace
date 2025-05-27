<?php

namespace App\Http\Controllers;

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
        return view('admin/data_produk.index');
    }
    public function dataprodukedit()
    {
        return view('admin.data_produk.detail');
    }
    public function dataproduktambah()
    {
        return view('admin_dataproduktambah');
    }
}
