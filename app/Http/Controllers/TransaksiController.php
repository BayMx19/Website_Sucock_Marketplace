<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\pesanan;
use App\Models\pengiriman;
use Carbon\Carbon;
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
            ->whereIn('pesanan.status_pesanan', ['Sudah Dibayar', 'Diproses', 'Sudah Dikirim', 'Selesai'])
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
            ->whereIn('pesanan.status_pesanan', ['Diproses', 'Sudah Dikirim', 'Selesai'])
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
            $pesanan->status_pesanan = 'Sudah Dikirim';
            $pesanan->save();
        }

        $pengiriman = pengiriman::findOrFail($id);
        if ($pengiriman->status_pengiriman === 'Belum Dikirim') {
            $pengiriman->status_pengiriman = 'Sudah Dikirim';
            $pengiriman->save();
        }

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    public function keranjang()
    {
        $pembeli_id = auth()->id();

        $pesanan = DB::table('pesanan')
            ->where('pembeli_id', $pembeli_id)
            ->where('status_pesanan', 'Belum Dibayar')
            ->first();

        $pesananData = null;
        $keranjangFinal = collect();

        if ($pesanan) {
            $keranjangIdsInPesanan = DB::table('keranjang_pesanan')
                ->where('pesanan_id', $pesanan->id)
                ->pluck('keranjang_id')
                ->toArray();

            $keranjangIn = Keranjang::with(['produk.penjual'])
                ->where('status', 'Belum Checkout')
                ->whereIn('id', $keranjangIdsInPesanan)
                ->get()
                ->map(function ($item) {
                    $item->is_in_pesanan = true;
                    return $item;
                });

            $keranjangOut = Keranjang::with(['produk.penjual'])
                ->where('status', 'Belum Checkout')
                ->where('pembeli_id', $pembeli_id)
                ->whereNotIn('id', $keranjangIdsInPesanan)
                ->get()
                ->map(function ($item) {
                    $item->is_in_pesanan = false;
                    return $item;
                });

            $keranjangFinal = $keranjangIn->where('status', 'Belum Checkout')->merge($keranjangOut);

            $pesananData = $pesanan;
        } else {
            $keranjangFinal = Keranjang::with(['produk.penjual'])
                ->where('pembeli_id', $pembeli_id)
                ->where('status', 'Belum Checkout')
                ->get()
                ->map(function ($item) {
                    $item->is_in_pesanan = false;
                    return $item;
                });
        }

        $grouped = $keranjangFinal->groupBy(function ($item) {
            return $item->produk->penjual->name ?? 'Toko Tidak Diketahui';
        });

        // dd($grouped);

        $adaPesananTertunda = Pesanan::where('pembeli_id', auth()->id())->where('status_pesanan', 'Belum Dibayar')->exists();

        return view('pembeli.keranjang.index', compact('grouped', 'pesananData', 'adaPesananTertunda'));
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
                            ->where('status', 'Belum Checkout')
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
            ->leftJoin('review', function($join) {
                $join->on('review.produk_id', '=', 'produk.id')
                    ->on('review.pesanan_id', '=', 'pesanan.id');
            })
            ->where('pembeli.id', $pembeli_id)
            ->select(
                'pesanan.id',
                'pesanan.kode_pesanan',
                'pesanan.total_harga',
                'pesanan.updated_at',
                'pesanan.status_pesanan',
                'produk.id as produk_id',
                'produk.nama_produk',
                'produk.harga',
                'produk.gambar',
                'penjual.name as nama_penjual',
                'keranjang.amount as jumlah_produk',
                'review.bintang',
                'review.review_text'
            )
            ->get()
            ->groupBy('status_pesanan')
            ->map(function ($grouped) {
                    return $grouped->groupBy('kode_pesanan'); 
                });

        return view('pembeli.riwayat_transaksi.index', compact('pesanan', 'pesananCounts'));
    }

    public function selesaikanPesanan($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status_pesanan = 'Selesai';
        $pesanan->save();

        return redirect()->back()->with('success', 'Pesanan telah diselesaikan.');
    }

    public function checkoutPesanan()
    {
        $dataPesanan = DB::table('pesanan')
            ->join('alamat', 'alamat.id', '=', 'pesanan.alamat_id')
            ->join('users as pembeli', 'pembeli.id', '=', 'pesanan.pembeli_id')
            ->join('keranjang_pesanan as kp', 'kp.pesanan_id', '=', 'pesanan.id')
            ->join('keranjang', 'keranjang.id', '=', 'kp.keranjang_id')
            ->join('produk', 'produk.id', '=', 'keranjang.produk_id')
            ->select('pembeli.name as nama_pembeli', 'pembeli.nohp', 'pesanan.total_harga', 'pesanan.kode_pesanan', 'alamat.*', 'keranjang.amount', 'produk.nama_produk', 'produk.harga', 'produk.gambar', 'produk.id as pesanan_id')
            ->where('pesanan.status_pesanan', 'Belum Dibayar')
            ->get();

        return view('pembeli.checkout.index', compact('dataPesanan'));
    }

    public function getSnapToken($kode)
    {
        $dataPesanan = DB::table('pesanan')
        ->join('alamat', 'alamat.id', '=', 'pesanan.alamat_id')
        ->join('users as pembeli', 'pembeli.id', '=', 'pesanan.pembeli_id')
        ->where('pesanan.kode_pesanan', $kode)
        ->select('pembeli.name as nama_pembeli', 'pembeli.nohp', 'pesanan.total_harga', 'pesanan.kode_pesanan')
        ->first();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $dataPesanan->kode_pesanan,
                'gross_amount' => $dataPesanan->total_harga,
            ),
            'customer_details' => array(
                'first_name' => $dataPesanan->nama_pembeli,
                'phone' => $dataPesanan->nohp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json(['snapToken' => $snapToken]);
    }

    public function updateHarga(Request $request, $kode)
    {
        $pembeli_id = Auth::id();

        DB::table('pesanan')->where('pembeli_id', $pembeli_id)->where('kode_pesanan', $kode)->update([
            'total_harga' => $request->total_harga,
        ]);

        return response()->json(['success' => true]);
    }

    public function checkoutStore(Request $request)
    {
        $pembeli_id = Auth::id();

        $alamat = DB::table('alamat')->join('users', 'users.id', '=', 'alamat.user_id')->where('users.id', $pembeli_id)->where('alamat.is_utama', 1)->value('alamat.id');

        $keranjangIds = $request->keranjang_id;

        $request -> validate([
            'kode_transaksi' => 'required|string',
            'total_harga' => 'required|int',
        ]);

        DB::beginTransaction();
        try {
            $pesanan_id = DB::table('pesanan')->insertGetId([
                'kode_pesanan' => $request->kode_transaksi,
                'alamat_id' => $alamat,
                'pembeli_id' => $pembeli_id,
                'total_harga' => $request->total_harga,
                'status_pesanan' => 'Belum Dibayar',
                'tanggal_pesanan' => Carbon::now('Asia/Jakarta')->toDateString()
            ]);

            $dataKeranjangPesanan = [];
            foreach ($keranjangIds as $keranjangId) {
                $dataKeranjangPesanan[] = [
                    'pesanan_id' => $pesanan_id,
                    'keranjang_id' => $keranjangId,
                ];
            }

            DB::table('keranjang_pesanan')->insert($dataKeranjangPesanan);

            DB::commit();

            return response()->json(['success' => true]);

        } catch (\exception $e){
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'Gagal menyimpan data.', 'error' => $e->getMessage()], 500);
        }
    }

    public function payment(Request $request, $kode)
    {
        $pembeli_id = Auth::id();

        $produkData = json_decode($request->input('produkData'), true);

        $dataPesan = DB::table('pesanan')->where('pembeli_id', $pembeli_id)->where('kode_pesanan', $kode)->first();

        try {
            DB::transaction(function () use ($dataPesan, $request, $kode, $produkData) {

                DB::table('pembayaran')->insert([
                    'pesanan_id'         => $dataPesan->id,
                    'metode_pembayaran'  => $request->metode_bayar,
                    'tanggal_pembayaran' => Carbon::now('Asia/Jakarta')->toDateString(),
                    'status_pembayaran'  => "Sudah Bayar",
                ]);

                DB::table('pengiriman')->insert([
                    'pesanan_id'        => $dataPesan->id,
                    'metode_pengiriman' => $request->metode_kirim,
                    'status_pengiriman' => "Belum Dikirim",
                ]);

                $statusPesanan = ($request->metode_bayar == 'COD') ? 'Diproses' : 'Sudah Dibayar';

                DB::table('pesanan')
                    ->join('keranjang_pesanan as kp', 'pesanan.id', '=', 'kp.pesanan_id')
                    ->join('keranjang', 'keranjang.id', '=', 'kp.keranjang_id')
                    ->where('kode_pesanan', $kode)
                    ->update([
                        'pesanan.status_pesanan' => $statusPesanan,
                        'keranjang.status'       => "Sudah Checkout",
                    ]);

                foreach ($produkData as $produk) {
                    $produkId = $produk['id'];
                    $amount   = $produk['amount'];

                    $produk = DB::table('produk')->where('id', $produkId)->first();

                    $stokSekarang = $produk->stok;
                    $namaProduk = $produk->nama_produk;

                    if ($stokSekarang === null) {
                        throw new \Exception("Produk {$namaProduk} tidak ditemukan.");
                    }

                    if ((int)$stokSekarang < (int)$amount) {
                        throw new \Exception("Stok tidak cukup untuk produk {$namaProduk}.");
                    }

                    DB::table('produk')
                        ->where('id', $produkId)
                        ->update([
                            'stok' => $stokSekarang - $amount,
                        ]);
                }
            });

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
