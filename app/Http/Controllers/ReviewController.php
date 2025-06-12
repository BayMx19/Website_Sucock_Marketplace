<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\pesanan;
use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function indexadmin(Request $request)
    {
        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
            'per_page' => 'nullable|integer|min:1|max:100'
        ]);

        $perPage = $validated['per_page'] ?? 10;

        $query = DB::table('review')
            ->join('pesanan', 'pesanan.id', '=', 'review.pesanan_id')
            ->join('users as pembeli', 'pembeli.id', '=', 'pesanan.pembeli_id')
            ->join('produk', 'produk.id', '=', 'review.produk_id')
            ->join('users as penjual', 'produk.penjual_id', '=', 'penjual.id')
            ->select(
                'review.id',
                'pembeli.name as nama_pembeli',
                'penjual.name as nama_penjual',
                'produk.nama_produk',
                'review.review_text',
                'review.bintang'
            )
            ->when($validated['search'] ?? null, function ($q, $search) {
                $q->where(function ($q2) use ($search) {
                    $q2->where('pembeli.name', 'like', "%{$search}%")
                        ->orWhere('penjual.name', 'like', "%{$search}%")
                        ->orWhere('produk.nama_produk', 'like', "%{$search}%");
                });
            });

        $review = $query->paginate($perPage);

        return view('admin.data_review.index', compact('review'));
    }

    public function detailadmin($id)
    {
        $review = DB::table('review')
            ->join('pesanan', 'pesanan.id', '=', 'review.pesanan_id')
            ->join('users as pembeli', 'pembeli.id', '=', 'pesanan.pembeli_id')
            ->join('produk', 'produk.id', '=', 'review.produk_id')
            ->join('users as penjual', 'produk.penjual_id', '=', 'penjual.id')
            ->where('review.id', $id)
            ->select(
                'review.id',
                'pembeli.name as nama_pembeli',
                'penjual.name as nama_penjual',
                'pesanan.kode_pesanan',
                'produk.nama_produk',
                'review.review_text',
                'review.bintang'
            )->first();

        return view('admin.data_review.detail', compact('review'));
    }

    public function indexpenjual(Request $request)
    {
        $penjual_id = Auth::id();

        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
            'per_page' => 'nullable|integer|min:1|max:100'
        ]);

        $perPage = $validated['per_page'] ?? 10;

        $query = DB::table('review')
            ->join('pesanan', 'pesanan.id', '=', 'review.pesanan_id')
            ->join('users as pembeli', 'pembeli.id', '=', 'pesanan.pembeli_id')
            ->join('produk', 'produk.id', '=', 'review.produk_id')
            ->join('users as penjual', 'produk.penjual_id', '=', 'penjual.id')
            ->where('penjual.id', $penjual_id)
            ->select(
                'review.id',
                'pembeli.name as nama_pembeli',
                'produk.nama_produk',
                'review.review_text',
                'review.bintang'
            )
            ->when($validated['search'] ?? null, function ($q, $search) {
                $q->where(function ($q2) use ($search) {
                    $q2->where('pembeli.name', 'like', "%{$search}%")
                        ->orWhere('produk.nama_produk', 'like', "%{$search}%");
                });
            });

        $review = $query->paginate($perPage);

        // dd($review);

        return view('penjual.data_review.index', compact('review'));
    }

    public function detailpenjual($id)
    {
        $penjual_id = Auth::id();

        $review = DB::table('review')
            ->join('pesanan', 'pesanan.id', '=', 'review.pesanan_id')
            ->join('users as pembeli', 'pembeli.id', '=', 'pesanan.pembeli_id')
            ->join('produk', 'produk.id', '=', 'review.produk_id')
            ->join('users as penjual', 'produk.penjual_id', '=', 'penjual.id')
            ->where('penjual.id', $penjual_id)
            ->where('review.id', $id)
            ->select(
                'review.id',
                'pembeli.name as nama_pembeli',
                'penjual.name as nama_penjual',
                'pesanan.kode_pesanan',
                'produk.nama_produk',
                'review.review_text',
                'review.bintang'
            )->first();

            // dd($review);

        return view('penjual.data_review.detail', compact('review'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'pesanan_id' => 'required|exists:pesanan,id',
            'bintang' => 'required|integer|min:1|max:5',
            'review_text' => 'nullable|string',
        ]);

        $review = Review::updateOrCreate(
            [
                'produk_id' => $validated['produk_id'],
                'pesanan_id' => $validated['pesanan_id'],
            ],
            [
                'bintang' => $validated['bintang'],
                'review_text' => $validated['review_text'],
            ]
        );

return response()->json(['success' => true]);
    }


}
