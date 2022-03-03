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
            'id' => '1',
            'username' => 'admin',
            'name' => 'Super Admin',
            'phone' => '081285118399',
            'email' => 'admin@kazaragi.com',
            'email_verified_at' => now(),
            'password' => Hash::make('adminadmin'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
