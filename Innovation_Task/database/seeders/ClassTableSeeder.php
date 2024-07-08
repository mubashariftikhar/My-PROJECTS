<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class')->insert([
            [
                'class_name' => 'BS(SE)',
                'class_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class_name' => 'BS(CS)',
                'class_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class_name' => 'BS(IT)',
                'class_status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class_name' => 'MS(CS)',
                'class_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],  
            [
                'class_name' => 'MS(IT)',
                'class_status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class_name' => 'MS(SE)',
                'class_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more classes as needed
        ]);
    }
}
