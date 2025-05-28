<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = DB::select("
            SELECT 
                pesanan.id, 
                pesanan.tanggal_pesanan, 
                pesanan.status_pesanan, 
                pembeli.name AS nama_pembeli, 
                produk.nama_produk, 
                penjual.name AS nama_penjual
            FROM pesanan
            JOIN users AS pembeli ON pesanan.user_id = pembeli.id
            JOIN produk ON pesanan.produk_id = produk.id
            JOIN users AS penjual ON penjual.id = produk.penjual_id
        ");


        return view('admin.data_pesanan.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    //(string $id)
    {
        return view('admin_datatransaksiedit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
