<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review = DB::select("
            SELECT
                pembeli.name AS nama_pembeli,
                penjual.name AS nama_penjual,
                produk.nama_produk,
                review.review_text,
                review.bintang
            FROM review
            JOIN users AS pembeli ON review.user_id = pembeli.id
            JOIN produk ON review.produk_id = produk.id
            JOIN users AS penjual ON penjual.id = produk.penjual_id
        
        ");
        return view('admin.data_review.index', compact('review'));
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
