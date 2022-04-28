<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'name' => 'Ruhul Amin',
            'position' => 'Chief Executive Officer',
            'image' => null,
            'desc' => 'Explicabo voluptatem mollitia et repellat',
            'linkin_id' => 'https://www.linkedin.com/feed/?trk=nav_logo',
            'facebook_id' => 'https://www.facebook.com/insan.moon.7/',
            'twitter_id' => 'https://www.linkedin.com/feed/?trk=nav_logo',
            'github_id' => 'https://github.com/ruhulamin63',
            'activeStatus' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
