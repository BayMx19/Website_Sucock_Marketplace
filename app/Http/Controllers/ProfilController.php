<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexpembeli()
    {
        return view('pembeli_profil');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function editpembeli($id)
    //(string $id)
    {
        return view('pembeli_editdata');
    }
    /*
    /**
     * Update the specified resource in storage.
     */
    public function updatepembeli(Request $request, $id)
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function indexpenjual()
    {
        $profilPenjual = Auth::user()->load('dataAlamat');
        // dd($profilPenjual);
        return view('/penjual/profile/index', compact('profilPenjual'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function editpenjual($id)
    //(string $id)
    {
        $profilPenjual = User::findOrFail($id);
        // dd($profilPenjual);
        return view('/penjual/profile/edit', compact('profilPenjual'));
    }
    /*
    /**
     * Update the specified resource in storage.
     */
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
    ];

    // Update atau insert alamat (jika belum ada)
    if ($profilPenjual->dataAlamat) {
        $profilPenjual->dataAlamat()->update($dataAlamat);
    } else {
        $profilPenjual->dataAlamat()->create($dataAlamat);
    }

    return redirect('/penjual/profile/')->with('success', 'Data berhasil diperbarui!');
}

        /**
     * Display a listing of the resource.
     */
    public function indexadmin()
    {
        $profilAdmin = Auth::user();
        return view('/admin/profile/index', compact('profilAdmin'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function editadmin($id)
    //(string $id)
    {
        return view('admin_editdata');
    }
    /*
    /**
     * Update the specified resource in storage.
     */
    public function updateadmin(Request $request, $id)
    {
        //
    }



}
