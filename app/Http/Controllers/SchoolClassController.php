<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\SchoolClass;

class SchoolClassController extends Controller
{
    // Show all classes
    public function index()
    {
        $classes = SchoolClass::latest()->get();
        return view('classes.index', compact('classes'));
    }

    // Create form
    public function create()
    {
        return view('classes.create');
    }

    // Store data
    public function store(Request $request)
    {
        $request->validate([
            'class_logo'=>'required',
            'class_name' => 'required',
            'teacher_name' => 'required',
            'fees' => 'required',
            'age' => 'required',
            'time' => 'required',
            'capacity' => 'required'
        ]);

        $imageName = null;

        // Image Upload
        if ($request->hasFile('class_logo')) {

            $image = $request->file('class_logo');

            $imageName = time().'.'.$image->getClientOriginalExtension();

            $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/uploads/classes';

            // Create folder if not exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true);
            }

            File::copy($image, $destinationPath.'/'.$imageName);
           // $image->move($destinationPath, $imageName);
        }


        

        SchoolClass::create([
            'class_logo'=>$imageName,
            'class_name' => $request->class_name,
            'teacher_name' => $request->teacher_name,
            'fees' => $request->fees,
            'age' => $request->age,
            'time'=> $request->time,
            'capacity' => $request->capacity,
        ]);

        return redirect()->route('classes.index')
            ->with('success', 'Class created successfully');
    }

    public function edit($id)
    {
        $class = SchoolClass::find($id);

        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, $id)
    {
        $class = SchoolClass::find($id);

        $imageName = $class->class_logo;
       // New Image Upload
        if ($request->hasFile('class_logo')) {

            // Old Image Delete
            if ($class->class_logo && file_exists($_SERVER['DOCUMENT_ROOT'].'/uploads/classes/'.$class->class_logo)) {
                unlink($_SERVER['DOCUMENT_ROOT'].'/uploads/classes/'.$class->class_logo);
            }

            $image = $request->file('class_logo');

            $imageName = time().'.'.$image->getClientOriginalExtension();

            
            $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/uploads/classes';

            // Create folder if not exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0775, true);
            }

            File::copy($image, $destinationPath.'/'.$imageName);

           // $image->move(public_path('uploads/classes'), $imageName);
        }

        $class->update([
             'class_name'   => $request->class_name,
            'fees'         => $request->fees,
            'teacher_name' => $request->teacher_name,
            'age'          => $request->age,
            'time'         => $request->time,
            'capacity'     => $request->capacity,
            'class_logo'         => $imageName,
        ]);

        return redirect()
                ->route('classes.index')
                ->with('success', 'Class Updated Successfully');
    }

    public function destroy($id)
    {
        $class = SchoolClass::find($id);

        $class->delete();

        return redirect()
                ->route('classes.index')
                ->with('success', 'Class Deleted Successfully');
    }
    

}