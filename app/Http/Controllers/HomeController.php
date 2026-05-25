<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

       $teachers = DB::table('users')
                    ->where('role', 'teacher')
                    ->get();
        $classes = SchoolClass::all();

        return view('front-end.home', compact('classes','teachers'));
    }

    
}