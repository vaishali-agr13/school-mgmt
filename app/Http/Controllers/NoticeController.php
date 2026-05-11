<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::latest()->get();

        return view('notices.index', compact('notices'));
    }

    public function store(Request $request)
    {
        Notice::create($request->all());

        return redirect('/admin/notices')
            ->with('success', 'Notice Added');
    }
}