<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'New York'],
            ['name' => 'Los Angeles'],
            ['name' => 'Chicago'],
            // Add more cities as needed
        ]);
    }
}
