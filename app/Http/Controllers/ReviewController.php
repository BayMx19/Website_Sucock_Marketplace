<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexadmin(Request $request)
    {
        $search = $request->query('searchorders');

        $query = "
            SELECT
                review.id,
                pembeli.name AS nama_pembeli,
                penjual.name AS nama_penjual,
                produk.nama_produk,
                review.review_text,
                review.bintang
            FROM review
            JOIN pesanan ON review.pesanan_id = pesanan.id
            JOIN users AS pembeli ON pesanan.user_id = pembeli.id
            JOIN produk ON pesanan.produk_id = produk.id
            JOIN users AS penjual ON produk.penjual_id = penjual.id
        ";

        $bindings = [];

        if (!empty($search)) {
            $query .= "
            WHERE 
                pembeli.name LIKE ? OR
                penjual.name LIKE ? OR
                produk.nama_produk LIKE ?
            ";
            $bindings = array_fill(0, 3, "%$search%");
        }

        $review = DB::select($query, $bindings);

        // dd($review);
        return view('admin.data_review.index', compact('review', 'search'));
    }

    /**
     * Display the specified resource.
     */
    public function detailadmin($id)
    {
        $review = DB::selectOne("
        SELECT
            review.id,
            pembeli.name AS nama_pembeli,
            penjual.name AS nama_penjual,
            pesanan.kode_pesanan,
            produk.nama_produk,
            review.review_text,
            review.bintang
        FROM review
        JOIN pesanan ON review.pesanan_id = pesanan.id
        JOIN users AS pembeli ON pesanan.user_id = pembeli.id
        JOIN produk ON pesanan.produk_id = produk.id
        JOIN users AS penjual ON produk.penjual_id = penjual.id
        WHERE review.id = ?", [$id]);
        // dd($review);
        return view('admin.data_review.detail', compact('review'));
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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