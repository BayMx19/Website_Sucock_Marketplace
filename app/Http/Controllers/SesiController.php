<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SesiController extends Controller
{
    function login()
    {
        return view('login');
    }
    function daftar()
    {
        return view('daftar');
    }

    function daftarpenjual()
    {
        return view('penjual_daftar');
    }
}
