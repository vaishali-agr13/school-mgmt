@extends('adminlte::page')

@section('title', 'Create Student')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <h1 class="m-0 text-dark">
        <i class="fas fa-calendar-check text-primary"></i>
       Create Student
    </h1>

</div>

@stop

@section('content')

<h2>Add Student</h2>

<form action="/admin/students" method="POST">

    @csrf

    <div class="mb-3">
        <label>Student Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Parent Name</label>
        <input type="text" name="parent_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Parent Mobile</label>
        <input type="text" name="parent_mobile" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Class</label>
        <input type="text" name="class" class="form-control" required>
    </div>

    <button class="btn btn-success">Save Student</button>

</form>

@endsection