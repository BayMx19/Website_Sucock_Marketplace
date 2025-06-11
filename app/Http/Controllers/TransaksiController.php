<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\pesanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
{
    public function indexadmin(Request $request)
    {
        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
            'per_page' => 'nullable|integer|min:1|max:100'
        ]);

        $perPage = $validated['per_page'] ?? 10;

        $subKeranjang = DB::table('keranjang_pesanan as kp')
        ->select('kp.pesanan_id', DB::raw('MIN(kp.keranjang_id) as keranjang_id'))
        ->groupBy('kp.pesanan_id');

        $query = DB::table('pesanan')
            ->join('users as pembeli', 'pembeli.id', '=', 'pesanan.pembeli_id')
            ->joinSub($subKeranjang, 'sub_kp', function ($join) {
                $join->on('sub_kp.pesanan_id', '=', 'pesanan.id');
            })
            ->join('keranjang', 'keranjang.id', '=', 'sub_kp.keranjang_id')
            ->join('produk', 'produk.id', '=', 'keranjang.produk_id')
            ->join('users as penjual', 'penjual.id', '=', 'produk.penjual_id')
            ->select(
                'pesanan.id',
                'pembeli.name AS nama_pembeli',
                'pesanan.kode_pesanan',
                'pesanan.tanggal_pesanan',
                'pesanan.status_pesanan',
                'pesanan.total_harga',
                'penjual.name AS nama_penjual'
            )
            ->when($validated['search'] ?? null, function ($q, $search) {
                $q->where(function ($q2) use ($search) {
                    $q2->where('pembeli.name', 'like', "%{$search}%")
                        ->orWhere('penjual.name', 'like', "%{$search}%")
                        ->orWhere('pesanan.kode_pesanan', 'like', "%{$search}%");
                });
            });

        $pesanan = $query->paginate($perPage);

        return view('admin.data_pesanan.index', compact('pesanan'));
    }

    public function detailadmin($id)
    {
        $subKeranjang = DB::table('keranjang_pesanan as kp')
            ->select('kp.pesanan_id', 'kp.keranjang_id')
            ->groupBy('kp.pesanan_id', 'kp.keranjang_id');

        $pesanan = DB::table('pesanan')
            ->select(
                'alamat.*',
                'pesanan.id',
                'pesanan.kode_pesanan',
                'pesanan.tanggal_pesanan',
                'pesanan.total_harga',
                'pesanan.status_pesanan',
                'pembeli.name as nama_pembeli',
                'pembeli.nohp',
                'produk.nama_produk',
                'produk.harga',
                'produk.gambar',
                'penjual.name as nama_penjual',
                'pengiriman.metode_pengiriman',
                'pembayaran.metode_pembayaran',
                'keranjang.amount as jumlah_produk'
            )
            ->join('users as pembeli', 'pembeli.id', '=', 'pesanan.pembeli_id')
            ->joinSub($subKeranjang, 'sub_kp', function ($join) {
                $join->on('sub_kp.pesanan_id', '=', 'pesanan.id');
            })
            ->join('keranjang', 'keranjang.id', '=', 'sub_kp.keranjang_id')
            ->join('produk', 'produk.id', '=', 'keranjang.produk_id')
            ->join('users as penjual', 'penjual.id', '=', 'produk.penjual_id')
            ->join('alamat', 'alamat.id', '=', 'pesanan.alamat_id')
            ->leftJoin('pembayaran', 'pembayaran.pesanan_id', '=', 'pesanan.id')
            ->leftJoin('pengiriman', 'pengiriman.pesanan_id', '=', 'pesanan.id')
            ->where('pesanan.id', $id)
            ->get();

        // dd($pesanan);

        return view('admin.data_pesanan.detail', compact('pesanan'));
    }

        public function updateStatusadmin($id)
    {
        $pesanan = pesanan::findOrFail($id);
        if ($pesanan->status_pesanan === 'Sudah Dibayar') {
            $pesanan->status_pesanan = 'Diproses';
            $pesanan->save();
        }

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function indexpenjual(Request $request)
    {
        $penjual_id = Auth::id();

        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
            'per_page' => 'nullable|integer|min:1|max:100'
        ]);

        $perPage = $validated['per_page'] ?? 10;

        $subKeranjang = DB::table('keranjang_pesanan as kp')
        ->select('kp.pesanan_id', DB::raw('MIN(kp.keranjang_id) as keranjang_id'))
        ->groupBy('kp.pesanan_id');

        $query = DB::table('pesanan')
            ->join('users as pembeli', 'pembeli.id', '=', 'pesanan.pembeli_id')
            ->joinSub($subKeranjang, 'sub_kp', function ($join) {
                $join->on('sub_kp.pesanan_id', '=', 'pesanan.id');
            })
            ->join('keranjang', 'keranjang.id', '=', 'sub_kp.keranjang_id')
            ->join('produk', 'produk.id', '=', 'keranjang.produk_id')
            ->join('users as penjual', 'penjual.id', '=', 'produk.penjual_id')
            ->where('penjual_id', $penjual_id)
            ->select(
                'pesanan.id',
                'pembeli.name AS nama_pembeli',
                'pesanan.kode_pesanan',
                'pesanan.tanggal_pesanan',
                'pesanan.status_pesanan',
                'pesanan.total_harga'
            )
            ->when($validated['search'] ?? null, function ($q, $search) {
                $q->where(function ($q2) use ($search) {
                    $q2->where('pembeli.name', 'like', "%{$search}%")
                        ->orWhere('pesanan.kode_pesanan', 'like', "%{$search}%");
                });
            });

        $pesanan = $query->paginate($perPage);

        return view('penjual.data_pesanan.index', compact('pesanan'));
    }


    public function detailpenjual($id)
    {
        $penjual = Auth::id();

        $subKeranjang = DB::table('keranjang_pesanan as kp')
            ->select('kp.pesanan_id', 'kp.keranjang_id')
            ->groupBy('kp.pesanan_id', 'kp.keranjang_id');

        $pesanan = DB::table('pesanan')
            ->select(
                'alamat.*',
                'pesanan.id',
                'pesanan.kode_pesanan',
                'pesanan.tanggal_pesanan',
                'pesanan.total_harga',
                'pesanan.status_pesanan',
                'pembeli.name as nama_pembeli',
                'pembeli.nohp',
                'produk.nama_produk',
                'produk.harga',
                'produk.gambar',
                'penjual.name as nama_penjual',
                'pengiriman.metode_pengiriman',
                'pembayaran.metode_pembayaran',
                'keranjang.amount as jumlah_produk'
            )
            ->join('users as pembeli', 'pembeli.id', '=', 'pesanan.pembeli_id')
            ->joinSub($subKeranjang, 'sub_kp', function ($join) {
                $join->on('sub_kp.pesanan_id', '=', 'pesanan.id');
            })
            ->join('keranjang', 'keranjang.id', '=', 'sub_kp.keranjang_id')
            ->join('produk', 'produk.id', '=', 'keranjang.produk_id')
            ->join('users as penjual', 'penjual.id', '=', 'produk.penjual_id')
            ->join('alamat', 'alamat.id', '=', 'pesanan.alamat_id')
            ->leftJoin('pembayaran', 'pembayaran.pesanan_id', '=', 'pesanan.id')
            ->leftJoin('pengiriman', 'pengiriman.pesanan_id', '=', 'pesanan.id')
            ->where('penjual.id', $penjual)
            ->where('pesanan.id', $id)
            ->get();

        // dd($pesanan);

        return view('penjual.data_pesanan.detail', compact('pesanan'));
    }
public function updateStatuspenjual($id)
    {
        $pesanan = pesanan::findOrFail($id);
        if ($pesanan->status_pesanan === 'Diproses') {
            $pesanan->status_pesanan = 'Sedang Dikirim';
            $pesanan->save();
        }

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
    public function keranjang()
    {
        $keranjang = Keranjang::with(['produk.penjual'])
            ->where('pembeli_id', auth()->id())
            ->get();

        $grouped = $keranjang->groupBy(function ($item) {
            return $item->produk->penjual->name ?? 'Toko Tidak Diketahui';
        });

        return view('pembeli.keranjang.index', compact('grouped'));
    }

    public function tambahKeranjang(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'amount' => 'required|integer|min:1',
        ]);

        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda harus login terlebih dahulu.'
            ], 401);
        }
        $keranjang = Keranjang::where('produk_id', $request->produk_id)
                            ->where('pembeli_id', $user->id)
                            ->first();

        if ($keranjang) {
            $keranjang->amount += $request->amount;
            $keranjang->save();
        } else {
            Keranjang::create([
                'produk_id' => $request->produk_id,
                'pembeli_id' => $user->id,
                'amount' => $request->amount,
                'status' => 'Belum Checkout',
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Produk berhasil ditambahkan ke keranjang.',
            'jumlah_keranjang' => Keranjang::where('pembeli_id', $user->id)
                                   ->where('status', 'Belum Checkout')
                                   ->count()
        ]);
    }

    public function destroyKeranjang($id)
    {
        $keranjang = Keranjang::findOrFail($id);

        if ($keranjang->pembeli_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus item ini.');
        }

        $keranjang->delete();

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
    }
    public function riwayatPesanan(Request $request)
    {
        $pembeli_id = Auth::id();

        $pesananCounts = DB::table('pesanan')
            ->join('users as pembeli', 'pembeli.id', '=', 'pesanan.pembeli_id')
            ->where('pembeli.id', $pembeli_id)
            ->select('status_pesanan', DB::raw('count(*) as jumlah'))
            ->groupBy('status_pesanan')
            ->pluck('jumlah', 'status_pesanan');

        $jmlDiproses = $pesananCounts['Diproses'] ?? 0;
        $jmlDibayar = $pesananCounts['Sudah Dibayar'] ?? 0;
        $jmlDikirim = $pesananCounts['Sudah Dikirim'] ?? 0;
        $jmlSelesai = $pesananCounts['Selesai'] ?? 0;

        $subKeranjang = DB::table('keranjang_pesanan as kp')
            ->select('kp.pesanan_id', 'kp.keranjang_id')
            ->groupBy('kp.pesanan_id', 'kp.keranjang_id');

        $pesanan = DB::table('pesanan')
            ->join('users as pembeli', 'pembeli.id', '=', 'pesanan.pembeli_id')
            ->joinSub($subKeranjang, 'sub_kp', function ($join) {
                $join->on('sub_kp.pesanan_id', '=', 'pesanan.id');
            })
            ->join('keranjang', 'keranjang.id', '=', 'sub_kp.keranjang_id')
            ->join('produk', 'produk.id', '=', 'keranjang.produk_id')
            ->join('users as penjual', 'penjual.id', '=', 'produk.penjual_id')
            ->select(
                'pesanan.id',
                'pesanan.kode_pesanan',
                'pesanan.total_harga',
                'pesanan.updated_at',
                'pesanan.status_pesanan',
                'produk.nama_produk',
                'produk.harga',
                'produk.gambar',
                'penjual.name as nama_penjual',
                'keranjang.amount as jumlah_produk'
            )
            ->where('pembeli.id', $pembeli_id)
            ->get()
            ->groupBy('pesanan.id');

        // dd($pesanan);

        return view('pembeli.riwayat_transaksi.index', compact('pesanan', 'jmlDiproses', 'jmlDikirim', 'jmlDibayar', 'jmlSelesai'));
    }

    public function checkoutPesanan()
    {
        return view('pembeli.checkout.index');
    }

}
