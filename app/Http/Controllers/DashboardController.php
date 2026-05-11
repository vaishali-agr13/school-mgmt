<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Attendance;
use App\Models\Fee;

class DashboardController extends Controller
{
    public function index()
    {
        $students = Student::count();

        $todayAttendance = Attendance::whereDate('date', today())
            ->where('status', 'Present')
            ->count();

        $pendingFees = Fee::where('status', 'Pending')->count();

        return view('dashboard', compact(
            'students',
            'todayAttendance',
            'pendingFees'
        ));
    }
}