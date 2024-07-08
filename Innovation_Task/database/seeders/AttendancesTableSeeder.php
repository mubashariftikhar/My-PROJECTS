<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendances')->insert([
            ['student_name' => 'John Doe', 'present_days' => 20, 'absent_days' => 5],
            ['student_name' => 'Jane Smith', 'present_days' => 18, 'absent_days' => 7],
            ['student_name' => 'Alice Johnson', 'present_days' => 22, 'absent_days' => 3],
            ['student_name' => 'Bob Brown', 'present_days' => 19, 'absent_days' => 6],
        ]);
    }
}
