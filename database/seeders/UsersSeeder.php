<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        'foto_profil' => "",
        'jenis_kelamin' => "Perempuan",
        'email_verified_at' => Carbon::now(),
        'status' => "ACTIVE",
        ]);

        DB::table('users')->insert([
        'name' => "Pembeli",
        'nohp' => "082191927762",
        'email' => "pembeli@gmail.com",
        'password' => Hash::make('Pembeli123'),
        'role' => "Pembeli",
        'foto_profil' => "",
        'jenis_kelamin' => "Laki-Laki",
        'email_verified_at' => Carbon::now(),
        'status' => "ACTIVE",
        ]);

        DB::table('users')->insert([
        'name' => "Admin",
        'nohp' => "082191927762",
        'email' => "admin@gmail.com",
        'password' => Hash::make('Admin123'),
        'email_verified_at' => Carbon::now(),
        'role' => "Admin",
        'foto_profil' => "",
        'jenis_kelamin' => "Perempuan",
        'status' => "ACTIVE",
        ]);

    }
}
