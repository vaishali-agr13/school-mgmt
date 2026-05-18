<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function create()
    {
        return view('teacher.create');
    }

    public function index()
    {
        $teachers = User::where('role', 'teacher')->latest()->get();

        return view('teacher.index', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>'teacher'
        ]);

        return redirect()->back()->with('success', 'Teacher Registered Successfully');
    }

    public function edit($id)
{
    $teacher = User::where('role', 'teacher')->findOrFail($id);

    return view('teacher.edit', compact('teacher'));
}

public function update(Request $request, $id)
{
    $teacher = User::where('role', 'teacher')->findOrFail($id);

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $teacher->id,
    ]);

    $teacher->name = $request->name;
    $teacher->email = $request->email;

    // Optional password update
    if($request->password != '')
    {
        $teacher->password = Hash::make($request->password);
    }

    $teacher->save();

    return redirect()->route('teacher.index')
                     ->with('success', 'Teacher Updated Successfully');
}

public function delete($id)
{
    $teacher = User::where('role', 'teacher')->findOrFail($id);

    $teacher->delete();

    return redirect()->route('teacher.index')
                     ->with('success', 'Teacher Deleted Successfully');
}
}