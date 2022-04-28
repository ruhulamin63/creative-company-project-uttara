<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'IPO Result',
            'product_image' => null,
            'activeStatus' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
