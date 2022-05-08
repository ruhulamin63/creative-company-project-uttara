<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companyprofiles')->insert([
            'company_name' => 'test',
            'reg_no' => 53453,
            'trade_licence_no' => 01,
            'company_logo' => 'test',
            'tagline' => 'test',
            'website' => 'test',
            'facebook_id' => 'test',
            'skype_id' => 'test',
            'bank_account_name' => 'test',
            'bank_name' => 'test',
            'branch_name' => 'test',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
