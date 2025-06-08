<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $list_produk = produk::with('user')->get();

        return view('pembeli.produk.produk', compact('list_produk'));
    }
    // public function show()
    // {
    //     return view('pembeli_detailproduk');
    // }

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
            return redirect('/penjual/data_produk/')->with('success', 'User berhasil ditambahkan.');
        } catch (QueryException $e) {
            return redirect('/penjual/data_produk/')->with('error', 'Gagal menambahkan User: Coba Lagi' );
        }
    }

    public function editpenjual($id){
        $produk = Produk::find($id);
        // dd($produk);
        return view('penjual.data_produk.edit', compact('produk'));
    }
    public function updatepenjual(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:ACTIVE,INACTIVE',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->deskripsi = $request->deskripsi;
        $produk->status = $request->status;

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && Storage::exists('public/' . $produk->gambar)) {
                Storage::delete('public/' . $produk->gambar);
            }

            $path = $request->file('gambar')->store('produk', 'public');
            $produk->gambar = $path;
        }

        $produk->save();

        return redirect()->route('penjual.data_produk.index')->with('success', 'Data produk berhasil diperbarui.');
    }
    public function detailpenjual($id)
    {
        $produk = Produk::find($id);
        // dd($produk);
        return view('penjual.data_produk.detail', compact('produk'));
    }

    public function destroypenjual($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar && Storage::exists('public/' . $produk->gambar)) {
            Storage::delete('public/' . $produk->gambar);
        }

        $produk->delete();

        return redirect()->route('penjual.data_produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
