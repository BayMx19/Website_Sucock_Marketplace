<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Function untuk menampilkan profil pembeli

    public function indexpembeli()
    {
        $user = User::with('dataAlamat')->find(auth()->id());
        return view('pembeli.profile.index', compact('user'));
    }
    // Function untuk Set Alamat Utama di role Pembeli
    public function setAlamatUtama(Request $request)
    {
        $user = auth()->user();

        // Reset semua alamat is_utama = false
        $user->dataAlamat()->update(['is_utama' => false]);

        // Set alamat yang dipilih jadi utama
        $alamatUtama = $user->dataAlamat()->where('id', $request->alamat_id)->first();
        if ($alamatUtama) {
            $alamatUtama->is_utama = true;
            $alamatUtama->save();
        }

        return back()->with('success', 'Alamat utama berhasil diubah.');
    }  

    // Function untuk menampilkan form tambah alamat di role Pembeli
    public function createAlamatpembeli()
    {
        return view('pembeli.alamat.create');
    }
    // Function untuk menyimpan alamat di role pembeli
    public function storeAlamatpembeli(Request $request)
    {
        $request->validate([
            'alamat' => 'required|string',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'kecamatan' => 'required|string',
            'kelurahan' => 'required|string',
            'RT' => 'nullable|string|max:3',
            'RW' => 'nullable|string|max:3',
            'kode_pos' => 'nullable|string',
        ]);

        $user = auth()->user();

        $user->dataAlamat()->create([
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'RT' => $request->RT,
            'RW' => $request->RW,
            'kode_pos' => $request->kode_pos,
        ]);

        return redirect()->route('pembeli.profile')->with('success', 'Alamat berhasil ditambahkan.');
    }
     /**
     * Show the form for editing the specified resource.
     */
    // Function untuk menampilkan form edit profil di role Pembeli
    public function editpembeli()
    //(string $id)
    {
        $user = auth()->user();
        return view('pembeli.profile.edit', compact('user'));
    }
    // Function untuk memperbarui profil di role Pembeli
    public function updatePembeli(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'nohp' => 'nullable|string|max:13',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->jenis_kelamin = $request->jenis_kelamin;

        if ($request->hasFile('foto_profil')) {
            $foto = $request->file('foto_profil')->store('foto_profil', 'public');
            $user->foto_profil = $foto;
        }

        $user->save();

        return redirect()->route('pembeli.profile')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Display a listing of the resource.
     */
    // Function untuk menampilkan profil penjual
    public function indexpenjual()
    {
        $profilPenjual = Auth::user()->load('dataAlamat');
        // dd($profilPenjual);
        return view('/penjual/profile/index', compact('profilPenjual'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    // Function untuk menampilkan form edit profil di role Penjual
    public function editpenjual($id)
    //(string $id)
    {
        $profilPenjual = Toko::with('alamat')->findOrFail($id);
        // dd($profilPenjual);
        return view('/penjual/profile/edit', compact('profilPenjual'));
    }
    /*
     */
    // Function untuk memperbarui profil di role Penjual
    public function updatepenjual(Request $request, $id)
    {
        $profilPenjual = User::findOrFail($id);

        // Data untuk tabel users
        $dataUser = [
            'name' => $request->name,
            'nohp' => $request->nohp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => $request->status,
        ];

        // Cek & upload foto profil jika ada
        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $path = $file->store('foto_profil', 'public');
            $dataUser['foto_profil'] = $path;
        }

        // Update tabel users
        $profilPenjual->update($dataUser);

        // Data untuk tabel alamat
        $dataAlamat = [
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'RT' => $request->RT,
            'RW' => $request->RW,
            'kode_pos' => $request->kode_pos,
            'is_utama' => true,
        ];

        $alamat = $profilPenjual->dataAlamat()->first();

        if ($alamat) {
            $alamat->update($dataAlamat);
        } else {
            $profilPenjual->dataAlamat()->create($dataAlamat);
        }
        
        return redirect('/penjual/profile/')->with('success', 'Data berhasil diperbarui!');
    }
    // Function untuk menampilkan profil admin
    public function indexadmin()
    {
        $profilAdmin = Auth::user();
        return view('/admin/profile/index', compact('profilAdmin'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    // Function untuk menampilkan form edit profil di role Admin
    public function editadmin($id)
    //(string $id)
    {
        return view('admin_editdata');
    }




}
