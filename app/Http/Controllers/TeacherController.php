<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


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
            'teacher_logo' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',

        ]);

        $imageName = null;

        if ($request->hasFile('teacher_logo')) {

            $image = $request->file('teacher_logo');

            $imageName = time().'.'.$image->getClientOriginalExtension();

            $image->move(public_path('uploads/teachers'), $imageName);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>'teacher',
            'teacher_logo'=>$imageName
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
    $teacher = User::where('role', 'teacher')->find($id);

    $imageName = $teacher->image;

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $teacher->id,
    ]);

    if ($request->hasFile('teacher_logo')) {

        // old image delete
        $oldImagePath = public_path('uploads/teachers/'.$teacher->teacher_logo);

        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        // upload new image
        $image = $request->file('teacher_logo');

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('uploads/teachers'), $imageName);
    }

    $teacher->name = $request->name;
    $teacher->email = $request->email;
    $teacher->teacher_logo = $imageName;

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

    public function getTeam(){
        $teachers = DB::table('users')
                        ->where('role', 'teacher')
                        ->get();
        return view('front-end.team', compact('teachers'));

    }
}