<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('attendance.index', compact('students'));
    }

    public function store(Request $request)
    {
       foreach ($request->status as $studentId => $status) {

                Attendance::updateOrCreate(

                    [
                        'student_id' => $studentId,
                        'date' => date('Y-m-d'),
                    ],

                    [
                        'status' => $status,
                    ]

                );
        }

        return redirect('/admin/attendance')
            ->with('success', 'Attendance Saved');
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);

        $students = Student::all();

        return view('attendance.edit', compact('attendance', 'students'));
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);

        $attendance->update([
            'student_id' => $request->student_id,
            'status' => $request->status,
            'date' => $request->date,
        ]);

        return redirect('/admin/attendance')
            ->with('success', 'Attendance Updated Successfully');
    }
}