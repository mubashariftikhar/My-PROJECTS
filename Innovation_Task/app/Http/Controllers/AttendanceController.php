<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendanceData = Attendance::all();

        $attendanceChartData = $attendanceData->map(function ($attendance) {
            return [
                'name' => $attendance->student_name,
                'data' => [$attendance->present_days, $attendance->absent_days]
            ];
        });

        return view('index', compact('attendanceChartData'));
    }
    public function show(){
        return view('taxtask');
    }
}
