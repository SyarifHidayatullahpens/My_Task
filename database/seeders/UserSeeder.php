<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
            'first_name' => 'admin',
            'last_name'  => 'pt alton',
            'username' => 'Admin',
            'phone' => '0'.random_int(00000000000, 99999999999),
            'company_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'company_id' => 1,
            'departement_id' => 1,
            'role' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'first_name' => 'user',
            'last_name'  => 'pt alton',
            'username' => 'User',      
            'phone' => '0'.random_int(00000000000, 99999999999),
            'company_id' => 1,
            'email' => 'user@gmail.com',
            'password' => Hash::make('password1234'),
            'company_id' => 2,
            'departement_id' => 2,
            'role' => 'user',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
    }
}
