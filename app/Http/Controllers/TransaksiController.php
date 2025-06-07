<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function indexadmin(Request $request)
    {
        $search = $request->query('searchorders');

        $query = "
             SELECT
                pesanan.id,
                pembeli.name AS nama_pembeli,
                pesanan.kode_pesanan,
                pesanan.tanggal_pesanan,
                pesanan.status_pesanan,
                pesanan.total_harga,
                penjual.name AS nama_penjual
            FROM pesanan
            JOIN users AS pembeli ON pesanan.user_id = pembeli.id
            JOIN produk ON JSON_EXTRACT(pesanan.produk, '$[0].produk_id') = produk.id
            JOIN users AS penjual ON produk.penjual_id = penjual.id
        ";

        $bindings = [];

        if (!empty($search)) {
            $query .= "
            WHERE 
                pembeli.name LIKE ? OR
                pesanan.kode_pesanan LIKE ? OR
            ";
            $bindings = array_fill(0, 2, "%$search%");
        }

        $pesanan = DB::select($query, $bindings);

        return view('admin.data_pesanan.index', compact('pesanan', 'search'));
    }

    /**
     * Display the specified resource.
     */
    public function detailadmin($id)
    {
        $pesanan = DB::table('pesanan')
        ->select(
            'pesanan.produk',
            'pesanan.id',
            'pesanan.kode_pesanan',
            'pesanan.tanggal_pesanan',
            'pesanan.total_harga',
            'pesanan.status_pesanan',
            'pembeli.name as nama_pembeli',
            'produk.nama_produk',
            'penjual.name as nama_penjual'
        )
        ->join('users as pembeli', 'pesanan.user_id', '=', 'pembeli.id')
        ->join('produk', DB::raw("CAST(JSON_EXTRACT(pesanan.produk, '$[0].produk_id') AS UNSIGNED)"), '=', 'produk.id')
        ->join('users as penjual', 'produk.penjual_id', '=', 'penjual.id')
        ->where('pesanan.id', $id)
        ->first();
        // dd($pesanan);
         return view('admin.data_pesanan.detail', compact('pesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function indexpenjual(Request $request)
    {
        $search = $request->query('searchorders');

        $penjual = Auth::id();

        $query = "
            SELECT
                pesanan.id,
                pembeli.name AS nama_pembeli,
                pesanan.kode_pesanan,
                pesanan.tanggal_pesanan,
                pesanan.status_pesanan,
                pesanan.total_harga
            FROM pesanan
            JOIN users AS pembeli ON pesanan.user_id = pembeli.id
            JOIN produk ON JSON_EXTRACT(pesanan.produk, '$[0].produk_id') = produk.id
            JOIN users AS penjual ON produk.penjual_id = penjual.id
            WHERE penjual.id = ?
        ";

         $bindings = [$penjual];

        if (!empty($search)) {
            $query .= " AND (pembeli.name LIKE ? OR pesanan.kode_pesanan LIKE ?) ";
            $bindings[] = "%$search%";
            $bindings[] = "%$search%";
        }

        $pesanan = DB::select($query, $bindings);

        return view('penjual.data_pesanan.index', compact('pesanan', 'search'));
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
