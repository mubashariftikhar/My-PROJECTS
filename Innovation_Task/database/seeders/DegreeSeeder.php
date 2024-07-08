<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Degree;

class DegreeSeeder extends Seeder
{
    public function run()
    {
        Degree::create(['name' => 'Bachelor of Science']);
        
        Degree::create(['name' => 'Master of Arts']);
        Degree::create(['name' => 'PhD in Computer Science']);
        // Add more degrees as needed
    }
}
