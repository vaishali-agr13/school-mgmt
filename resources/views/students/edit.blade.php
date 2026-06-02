@extends('adminlte::page')

@section('title', 'Edit Student')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <h1 class="m-0 text-dark">
        <i class="fas fa-calendar-check text-primary"></i>
       Edit Student
    </h1>

</div>

@stop

@section('content')

<!-- <h2 class="mb-4">Edit Student</h2> -->

<form action="/admin/students/{{ $student->id }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Student Name</label>

        <input 
            type="text" 
            name="name" 
            class="form-control"
            value="{{ $student->name }}"
        required>
    </div>

    <div class="mb-3">
        <label>Parent Name</label>

        <input 
            type="text" 
            name="parent_name" 
            class="form-control"
            value="{{ $student->parent_name }}"
       required>
    </div>

    <div class="mb-3">
        <label>Parent Mobile</label>

        <input 
            type="text" 
            name="parent_mobile" 
            class="form-control"
            value="{{ $student->parent_mobile }}"
        required>
    </div>

    <div class="mb-3">
        <label>Class</label>

        <input 
            type="text" 
            name="class" 
            class="form-control"
            value="{{ $student->class }}"
       required>
    </div>

    <button class="btn btn-primary">
        Update Student
    </button>

    <a href="/students" class="btn btn-secondary">
        Back
    </a>

</form>

@endsection