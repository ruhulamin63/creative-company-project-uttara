<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('careers')->insert([
            'position_name' => 'Executive, Marketing',
            'company_name' => 'Synesis IT Ltd.',
            'vacancy' => 01,
            'job_type' => 'Full Time',
            'apply_date' => '06-Sep-2021',
            'job_context' => 'Synesis IT now invites applications from candidates who are talented and maintaining high ethical standard for the post of Executive, Marketing. The candidates who possess self driven, innovative attitude with problem solving skills will discover their right environment and find fast track career growth in Synesis IT.Job Description / Responsibility',
            'job_nature' => 'Full-time',
            'edu_requirment' => 'Must have BBA / MBA in Marketing from any reputed University;',
            'job_location' => 'Dhaka',
            'salary_range' => ' Negotiable',
            'other_benefit' => 'As per company policy.',
            'activeStatus' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
