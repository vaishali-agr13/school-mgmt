@extends('adminlte::page')

@section('title', 'Edit Class')

@section('content_header')
    <h1>Edit Class</h1>
@stop

@section('content')

<div class="card card-outline card-primary">

    <div class="card-header bg-light">
        <h3 class="card-title">Update Class Details</h3>
    </div>

    <form action="{{ route('classes.update', $class->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Class Name</label>
                        <input type="text"
                               name="class_name"
                               class="form-control"
                               value="{{ $class->class_name }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Fees</label>
                        <input type="text"
                               name="fees"
                               class="form-control"
                               value="{{ $class->fees }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Teacher Name</label>
                        <input type="text"
                               name="teacher_name"
                               class="form-control"
                               value="{{ $class->teacher_name }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text"
                               name="age"
                               class="form-control"
                               value="{{ $class->age }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Time</label>
                        <input type="text"
                               name="time"
                               class="form-control"
                               value="{{ $class->time }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Capacity</label>
                        <input type="number"
                               name="capacity"
                               class="form-control"
                               value="{{ $class->capacity }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Class Logo</label>

                    {{-- File Input --}}
                    <div class="custom-file">
                        <input type="file"
                            name="class_logo"
                            class="custom-file-input"
                            id="logo">

                        <label class="custom-file-label" for="logo">
                            Choose Image
                        </label>
                    </div>

                    {{-- Old Image --}}
                    @if($class->class_logo)
                        <div class="mt-3">
                            <img src="{{ asset('uploads/classes/'.$class->class_logo) }}"
                                width="120"
                                height="120"
                                style="object-fit:cover; border-radius:10px; border:1px solid #ddd;">
                        </div>
                    @endif

                </div>

            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Class
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