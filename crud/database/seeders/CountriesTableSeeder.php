<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            ['name' => 'United States'],
            ['name' => 'Canada'],
            ['name' => 'United Kingdom'],
            // Add more countries as needed
        ]);
    }
}

