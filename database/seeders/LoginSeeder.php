<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ruhul Amin',
            'username' => 'user',
            'contact_number' => '01743369163',
            'password' => Hash::make('user'),
            'user_type' => 2,
            'activeStatus' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Hridoy Khan',
            'username' => 'admin',
            'contact_number' => '01689385783',
            'password' => Hash::make('admin'),
            'user_type' => 1,
            'activeStatus' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
