<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('penjual_profil');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function editpenjual($id)
    //(string $id)
    {
        return view('penjual_editdata');
    }
    /*
    /**
     * Update the specified resource in storage.
     */
    public function updatepenjual(Request $request, $id)
    {
        //
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
