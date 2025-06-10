<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_datatokotambah');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $toko = Toko::findOrFail($id);
        // dd($toko);
         return view('admin.data_toko.detail', compact('toko'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    //(string $id)
    {
        return view('admin_datatokoedit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $toko = Toko::findOrFail($id);
        $toko->delete();

        return redirect('/admin/data_toko/')->with('success', 'Data berhasil dihapus!');
    }
}
