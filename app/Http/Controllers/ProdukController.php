<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

    public function indexpenjual(){
        $produk = Produk::where('penjual_id', Auth::id())->latest()->get();
        return view('penjual.data_produk.index', compact('produk'));
    }
    public function createpenjual()
    {
        return view('penjual.data_produk.create');
    }
    public function storepenjual(Request $request)
    {
        // Log::info('Memulai proses insert produk', $request->all());
        try{
            if ($request->hasFile('foto_produk')) {
                $file = $request->file('foto_produk');
                $path = $file->store('foto_produk', 'public');
            } else {
                $path = null;
            }

            DB::table('produk')->insert([
                'gambar' => $path,
                'penjual_id' => $request->penjual_id,
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status,
            ]);
            // Log::info('Produk berhasil di-insert ke database.');
            return redirect('/penjual/data_produk/')->with('success', 'User berhasil ditambahkan.');
        } catch (QueryException $e) {
            //  Log::error('Gagal insert produk: ' . $e->getMessage());
            return redirect('/penjual/data_produk/')->with('error', 'Gagal menambahkan User: Coba Lagi' );
        }
    }

    public function editpenjual($id){
        $produk = Produk::with('user')->get();
        dd($produk);
        return view('penjual.data_produk.edit', compact('produk'));
    }

}
