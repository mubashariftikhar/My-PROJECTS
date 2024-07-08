<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task1students')->insert([
            [
                'std_name' => Str::random(10),
                'std_age' => rand(18, 25),
                'std_status' => '1',
                'registered_on' => now(),
                'added_on' => now(),
                'std_class' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'std_name' => Str::random(10),
                'std_age' => rand(18, 25),
                'std_status' => '1',
                'registered_on' => now(),
                'added_on' => now(),
                'std_class' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'std_name' => Str::random(10),
                'std_age' => rand(18, 25),
                'std_status' => '2',
                'registered_on' => now(),
                'added_on' => now(),
                'std_class' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'std_name' => Str::random(10),
                'std_age' => rand(18, 25),
                'std_status' => '2',
                'registered_on' => now(),
                'added_on' => now(),
                'std_class' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'std_name' => Str::random(10),
                'std_age' => rand(18, 25),
                'std_status' => '2',
                'registered_on' => now(),
                'added_on' => now(),
                'std_class' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'std_name' => Str::random(10),
                'std_age' => rand(18, 25),
                'std_status' => '3',
                'registered_on' => now(),
                'added_on' => now(),
                'std_class' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more students as needed
        ]);
    }
}
