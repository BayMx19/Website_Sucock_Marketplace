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
    // Function untuk menampilkan list data produk di Role Admin
    public function dataproduk(Request $request)
    {
        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
            'per_page' => 'nullable|integer|min:1|max:100'
        ]);

        $perPage = $validated['per_page'] ?? 10000;

        $query = Produk::with('promo', 'penjual')
    ->when($validated['search'] ?? null, function($q, $search) {
        $q->whereHas('penjual', function($q2) use ($search) {
            $q2->where('name', 'like', "%{$search}%");
        })->orWhere('nama_produk', 'like', "%{$search}%");
    });
        $produk = $query->paginate($perPage);

        return view('admin.data_produk.index', compact('produk'));
    }
    // Function untuk melihat detail produk di Role Admin
    public function dataprodukdetail($id)
    {
        $produk = Produk::with('user', 'promo')->findOrFail($id);
        // dd($produk);
        return view('admin.data_produk.detail', compact('produk'));
    }
    // Function untuk menampilkan list data produk di Role Penjual
    public function indexpenjual(Request $request){
        $penjual_id = Auth::id();

        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
            'per_page' => 'nullable|integer|min:1|max:100'
        ]);

        $perPage = $validated['per_page'] ?? 10000;

        $query = DB::table('produk')
        ->leftJoin('promos', 'produk.promo_id', '=', 'promos.id')
        ->where('produk.penjual_id', $penjual_id)
        ->select(
            'produk.id',
            'produk.nama_produk',
            'produk.harga',
            'produk.status',
            'produk.stok',
            'promos.nama as nama_promo',
            'promos.diskon_persen'
        )
        ->when($validated['search'] ?? null, function ($q, $search) {
            $q->where(function ($q2) use ($search) {
                $q2->where('produk.nama_produk', 'like', "%{$search}%");
            });
        });

        $produk = $query->paginate($perPage);

        return view('penjual.data_produk.index', compact('produk'));
    }
    // Function untuk menampilkan form tambah produk di Role Penjual
    public function createpenjual()
    {
        $penjual_id = Auth::id();
        $promos = DB::table('promos')
            ->where('penjual_id', $penjual_id)
            ->select('id', 'nama', 'diskon_persen') 
            ->get();

        return view('penjual.data_produk.create', compact('promos'));
    }
    // Function untuk menyimpan data produk di Role Penjual
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
                'promo_id' => $request->promo_id,
            ]);
            return redirect('/penjual/data_produk/')->with('success', 'User berhasil ditambahkan.');
        } catch (QueryException $e) {
            return redirect('/penjual/data_produk/')->with('error', 'Gagal menambahkan User: Coba Lagi' );
        }
    }
    // Function untuk menampilkan form edit produk di Role Penjual
    public function editpenjual($id){
        $produk = Produk::find($id);
        // dd($produk);
        $penjual_id = Auth::id();
        $promos = DB::table('promos')
            ->where('penjual_id', $penjual_id)
            ->select('id', 'nama', 'diskon_persen')
            ->get();
        return view('penjual.data_produk.edit', compact('produk','promos'));
    }
    // Function untuk memperbarui data produk di Role Penjual
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
            'promo_id' => 'nullable|exists:promos,id',
        ]);

        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->deskripsi = $request->deskripsi;
        $produk->status = $request->status;
        $produk->promo_id = $request->promo_id;

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
    // Function untuk melihat detail produk di Role Penjual
    public function detailpenjual($id)
    {
        $produk = Produk::with('promo') 
                    ->where('penjual_id', Auth::id()) 
                    ->findOrFail($id);

        return view('penjual.data_produk.detail', compact('produk'));
    }
    // Function untuk menghapus produk di Role Penjual
    public function destroypenjual($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar && Storage::exists('public/' . $produk->gambar)) {
            Storage::delete('public/' . $produk->gambar);
        }

        $produk->delete();

        return redirect()->route('penjual.data_produk.index')->with('success', 'Produk berhasil dihapus.');
    }
    // Function untuk menampilkan list data produk di Role Pembeli
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
            'per_page' => 'nullable|integer|min:1|max:100'
        ]);

        $perPage = $validated['per_page'] ?? 10000;

        $query = DB::table('produk')
            ->leftJoin('promos', 'promos.id', '=', 'produk.promo_id')
            ->join('users', 'users.id', '=', 'produk.penjual_id')
            ->select(
                'produk.*',
                'users.name',
                'promos.nama as promo_nama',
                'promos.diskon_persen'
            )
            ->when($validated['search'] ?? null, function ($q, $search) {
                $q->where('produk.nama_produk', 'like', "%{$search}%");
            });

        $list_produk = $query->paginate($perPage);

        return view('pembeli.produk.produk', compact('list_produk'));
    }

}
