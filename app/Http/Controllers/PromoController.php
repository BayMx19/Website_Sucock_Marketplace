<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PromoController extends Controller
{
    public function indexpenjual(Request $request)
    {
        $penjual_id = Auth::id();

        $validated = $request->validate([
            'search' => 'nullable|string|max:255',
            'per_page' => 'nullable|integer|min:1|max:100'
        ]);

        $perPage = $validated['per_page'] ?? 10000;

        $query = DB::table('promos')
            ->where('penjual_id', $penjual_id)
            ->select(
                'id',
                'nama',
                'diskon_persen',
                'mulai',
                'selesai',
                'status'
            )
            ->when($validated['search'] ?? null, function ($q, $search) {
                $q->where(function ($q2) use ($search) {
                    $q2->where('nama', 'like', "%{$search}%");
                });
            });

        $promos = $query->paginate($perPage);

        return view('penjual.data_promo.index', compact('promos'));
    }

    // Function untuk menampilkan form tambah promo di Role Penjual
    public function createpenjual()
    {
        return view('penjual.data_promo.create');
    }

    // Function untuk menyimpan promo baru di Role Penjual
    public function storepenjual(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'diskon_persen' => 'required|numeric|min:0',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
            'status' => 'required|in:ACTIVE,INACTIVE',
        ]);

        try {
            DB::table('promos')->insert([
                'penjual_id' => Auth::id(),
                'nama' => $request->nama,
                'diskon_persen' => $request->diskon_persen,
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
                'status' => $request->status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('penjual.data_promo.index')
                ->with('success', 'Promo berhasil ditambahkan.');
        } catch (QueryException $e) {
            return redirect()->route('penjual.data_promo.index')
                ->with('error', 'Gagal menambahkan promo: Coba lagi.');
        }
    }

    // Function untuk menampilkan form edit promo di Role Penjual
    public function editpenjual($id)
    {
        $promo = Promo::where('penjual_id', Auth::id())->findOrFail($id);

        return view('penjual.data_promo.edit', compact('promo'));
    }

    // Function untuk memperbarui promo di Role Penjual
    public function updatepenjual(Request $request, $id)
    {
        $promo = Promo::where('penjual_id', Auth::id())->findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'diskon_persen' => 'required|numeric|min:0',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
            'status' => 'required|in:ACTIVE,INACTIVE',
        ]);

        $promo->update([
            'nama' => $request->nama,
            'diskon_persen' => $request->diskon_persen,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'status' => $request->status,
        ]);

        return redirect()->route('penjual.data_promo.index')->with('success', 'Promo berhasil diperbarui.');
    }

    // Function untuk menampilkan detail promo di Role Penjual
    public function detailpenjual($id)
    {
        $promo = Promo::where('penjual_id', Auth::id())->findOrFail($id);

        return view('penjual.data_promo.detail', compact('promo'));
    }

    // Function untuk menghapus promo di Role Penjual
    public function destroypenjual($id)
    {
        $promo = Promo::where('penjual_id', Auth::id())->findOrFail($id);

        $promo->delete();

        return redirect()->route('penjual.data_promo.index')->with('success', 'Promo berhasil dihapus.');
    }
}
