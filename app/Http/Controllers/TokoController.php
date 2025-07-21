<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Function untuk menampilkan Data Toko di role Admin
    public function index(Request $request)
    {
        $search = $request->query('search');

        if(empty($search)) {
             $toko = Toko::where('role', 'Penjual')->get();
        } else {
            $toko = Toko::where('role', 'Penjual')
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('role', 'like', "%{$search}%")
                    ->orWhere('jenis_kelamin', 'like', "%{$search}%");
            })->get();
        }

        return view('admin.data_toko.index', compact('toko', 'search'));
    }
    
    /**
     * Display the specified resource.
     */
    // Function untuk melihat detail Data Toko di role Admin
    public function detail($id)
    {
        $toko = Toko::with('dataAlamat')->findOrFail($id);
        // dd($toko);
         return view('admin.data_toko.detail', compact('toko'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit()
    // //(string $id)
    // {
    //     return view('admin_datatokoedit');
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // Function untuk menghapus Data Toko di role Admin
    public function destroy($id)
    {
        $toko = Toko::findOrFail($id);
        $toko->delete();

        return redirect('/admin/data_toko/')->with('success', 'Data berhasil dihapus!');
    }
}
