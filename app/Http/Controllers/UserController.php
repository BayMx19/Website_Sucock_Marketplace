<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if (empty($search)) {
            $users = User::all();
        } else {
            // Jika ada pencarian, filter data
            $users = User::where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('role', 'like', "%{$search}%")
                    ->orWhere('jenis_kelamin', 'like', "%{$search}%");
            })->get();
        }

        return view('admin.data_users.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.data_users.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        try{
            if ($request->hasFile('foto_profil')) {
                $file = $request->file('foto_profil');
                $path = $file->store('foto_profil', 'public');
            } else {
                $path = null;
            }

            $userId = DB::table('users')->insertGetId([
                'name' => $request->name,
                'nohp' => $request->nohp,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'foto_profil' => $path,
                'jenis_kelamin' => $request->jenis_kelamin,
                'status' => $request->status,
            ]);
            DB::table('alamat')->insert([
                'user_id' => $userId,
                'alamat' => $request->alamat,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'RT' => $request->RT,
                'RW' => $request->RW,
                'kode_pos' => $request->kode_pos,

            ]);


            return redirect('/admin/data_users/')->with('success', 'User berhasil ditambahkan.');
        } catch (QueryException $e) {
            return redirect('/admin/data_users/')->with('error', 'Gagal menambahkan User: Coba Lagi' );
        }
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $user = User::with('dataAlamat')->findOrFail($id);
        // dd($user);
         return view('admin.data_users.detail', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::with('dataAlamat')->findOrFail($id);
        // dd($user);
         return view('admin.data_users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $dataUser = [
            'name' => $request->name,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'role' => $request->role,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => $request->status,
        ];

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $path = $file->store('foto_profil', 'public');
            $dataUser['foto_profil'] = $path;
        }

        $user->update($dataUser);

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

        if ($user->dataAlamat) {
            $user->dataAlamat()->update($dataAlamat);
        } else {
            $user->dataAlamat()->create($dataAlamat);
        }

        return redirect('/admin/data_users/')->with('success', 'Data berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/admin/data_users/')->with('success', 'Data berhasil dihapus!');
    }
}
