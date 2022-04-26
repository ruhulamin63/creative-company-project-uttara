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
            'father_name' => 'test',
            'mother_name' => 'test',
            'address' => 'Kutial',
            'contact_number' => '01743369163',
            'password' => Hash::make('user'),
            'image' => null,
            'nid_front_side_image' => null,
            'nid_back_side_image' => null,
            'dob_day' => 03,
            'dob_month' => 03,
            'dob_year' => 1990,
            'nid' => 198080090,
            'user_type' => 2,
            'info_verify' => 0,
            'loan_verify' => 0,
            'delivery_loan' => 0,
            'activeStatus' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Hridoy Khan',
            'father_name' => 'test',
            'mother_name' => 'test',
            'address' => 'Dhaka',
            'contact_number' => '01689385783',
            'password' => Hash::make('admin'),
            'image' => null,
            'nid_front_side_image' => null,
            'nid_back_side_image' => null,
            'dob_day' => 07,
            'dob_month' => 07,
            'dob_year' => 1980,
            'nid' => 19845450,
            'user_type' => 1,
            'info_verify' => 0,
            'loan_verify' => 0,
            'delivery_loan' => 0,
            'activeStatus' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
