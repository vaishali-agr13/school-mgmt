<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        $students = Student::all();

        $fees = Fee::with('student')->get();

        return view('fees.index', compact('students', 'fees'));
    }

    public function store(Request $request)
    {
        Fee::create($request->all());

        return redirect('/admin/fees')
            ->with('success', 'Fees Added');
    }
}