<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'service_name' => 'test',
            'service_desc' => 'test',
            'service_image' => null,
            'activeStatus' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
