@extends('adminlte::page')

@section('title', 'Create Class')

@section('content_header')
    <h1>Create Class</h1>
@stop

@section('content')

{{-- Success Message --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Error Message --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add New Class</h3>
    </div>

    <form action="{{ route('classes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">

            <div class="form-group">
                <label for="class_name">Class Name</label>
                <input type="text"
                       name="class_name"
                       id="class_name"
                       class="form-control"
                       placeholder="Enter class name" required>
            </div>

            <div class="form-group">
                <label for="teacher_name">Class Teacher Name</label>
                <input type="text"
                       name="teacher_name"
                       class="form-control"
                       placeholder="Enter teacher name" required>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="text"
                       name="age"
                       class="form-control"
                       placeholder="Enter Age" required>
            </div>

            <div class="form-group">
                <label for="time">Time</label>
                <input type="text"
                       name="time"
                       class="form-control"
                       placeholder="Enter Time" required>
            </div>


            <div class="form-group">
                <label for="teacher_name">Fees</label>
                <input type="text"
                       name="fees"
                       class="form-control"
                       placeholder="Enter Fees" required>
            </div>

            <div class="form-group">
                <label for="capacity">Capacity</label>
                <input type="text"
                       name="capacity"
                       class="form-control"
                       placeholder="Enter class capacity" required>
            </div>

            <!-- <div class="form-group">
                <label for="class_logo">Class Logo</label>

                <div class="custom-file">
                    <input type="file"
                        name="class_logo"
                        class="custom-file-input" required>

                    <label class="custom-file-label" for="logo">
                        Choose logo image
                    </label>
                </div>
            </div> -->

            <div class="form-group">
                <label>Class Logo</label>

                <div class="custom-file">
                    <input type="file"
                        name="class_logo"
                        class="custom-file-input"
                        id="logo">

                    <label class="custom-file-label" for="logo">
                        Choose Image
                    </label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Save Class
            </button>

            <a href="{{ route('classes.index') }}" class="btn btn-secondary">
                Cancel
            </a>
        </div>

    </form>
</div>

@stop

@section('js')
<script>
    // Show selected file name
    document.addEventListener("DOMContentLoaded", function () {

        const fileInput = document.querySelector('.custom-file-input');

        fileInput.addEventListener('change', function (e) {

            let fileName = e.target.files[0].name;

            let nextSibling = e.target.nextElementSibling;

            nextSibling.innerText = fileName;

        });

    });
</script>
@stop