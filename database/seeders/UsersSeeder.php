<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        'name' => "Penjual",
        'nohp' => "082191927762",
        'email' => "penjual@gmail.com",
        'password' => Hash::make('Penjual123'),
        'role' => "Penjual",
        'alamat' => "Gresik",
        'provinsi' => "Jawa Timur",
        'kota' => "Gresik",
        'kecamatan' => "Panceng",
        'kelurahan' => "SERAH",
        'RT' => "001",
        'RW' => "013",
        'kode_pos' => "60122",
        'foto_profil' => "",
        'jenis_kelamin' => "Perempuan",
        'status' => "ACTIVE",
        ]);

        DB::table('users')->insert([
        'name' => "Pembeli",
        'nohp' => "082191927762",
        'email' => "pembeli@gmail.com",
        'password' => Hash::make('Pembeli123'),
        'role' => "Pembeli",
        'alamat' => "Gresik",
        'provinsi' => "Jawa Timur",
        'kota' => "Gresik",
        'kecamatan' => "Panceng",
        'kelurahan' => "SERAH",
        'RT' => "001",
        'RW' => "013",
        'kode_pos' => "60122",
        'foto_profil' => "",
        'jenis_kelamin' => "Laki-Laki",
        'status' => "ACTIVE",
        ]);

        DB::table('users')->insert([
        'name' => "Admin",
        'nohp' => "082191927762",
        'email' => "admin@gmail.com",
        'password' => Hash::make('Admin123'),
        'role' => "Admin",
        'alamat' => "Gresik",
        'provinsi' => "Jawa Timur",
        'kota' => "Gresik",
        'kecamatan' => "Panceng",
        'kelurahan' => "SERAH",
        'RT' => "001",
        'RW' => "013",
        'kode_pos' => "60122",
        'foto_profil' => "",
        'jenis_kelamin' => "Perempuan",
        'status' => "ACTIVE",
        ]);

    }
}