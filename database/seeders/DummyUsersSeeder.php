<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUsersSeeder extends Seeder
{
    public function run()
    {
        $userData = [
            [
                'name' => 'fifit syafaaty',
                'email' => 'fifitsyafaaty@gmail.com',
                'role' =>'admin',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'lasmijan',
                'email' => 'lasmijan@gmail.com',
                'role' =>'penjual',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'kurnia',
                'email' => 'kurnia@gmail.com',
                'role' =>'pembeli',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
