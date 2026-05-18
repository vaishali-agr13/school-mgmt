@extends('adminlte::page')

@section('title', 'Edit Student')

@section('content_header')

<div class="container mt-4">

    <div class="card">

        <div class="card-header">
            <h4>Edit Teacher</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Name</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $teacher->name) }}">

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email', $teacher->email) }}">

                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Password</label>

                    <input type="password"
                           name="password"
                           class="form-control">

                    <small class="text-muted">
                        Leave blank if you don't want to change password
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update Teacher
                </button>

            </form>

        </div>

    </div>

</div>

@endsection