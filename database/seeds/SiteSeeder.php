<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([
            [
                'url' => 'http://www.example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'url' => 'http://www.example.org',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
