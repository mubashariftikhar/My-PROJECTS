<?php

namespace Database\Seeders;

use App\Models\Degree;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClassTableSeeder::class,
        ]);
            $this->call([
                StudentsTableSeeder::class,
            ]);
            $this->call([
                DegreeSeeder::class,
            ]);
            $this->call([
                StdClassesSeeder::class,
            ]);
            $this->call([
                AttendancesTableSeeder::class,
            ]);


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
