<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 1,
            'password' => Hash::make('152928'),
        ]);
        DB::table('users')->insert([

            'name' => 'user',
            'email' => '1@gmail.com',
            'role' => 2,
            'password' => Hash::make('152928'),
        ]);
    }
}
