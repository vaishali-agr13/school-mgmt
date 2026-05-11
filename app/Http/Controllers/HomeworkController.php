<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function index()
    {
        $homeworks = Homework::all();

        return view('homework.index', compact('homeworks'));
    }

    public function store(Request $request)
    {
        Homework::create($request->all());

        return redirect('/admin/homework')
            ->with('success', 'Homework Added');
    }
}