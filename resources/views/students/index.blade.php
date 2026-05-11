@extends('adminlte::page')

@section('title', 'Students Management')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <h1 class="m-0 text-dark">
        <i class="fas fa-user-graduate text-primary"></i>
        Students Management
    </h1>

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Students</li>
    </ol>

</div>

@stop

@section('content')

<div class="card card-primary card-outline shadow">

    <div class="card-header">

        <div class="d-flex justify-content-between align-items-center w-100">

            <h3 class="card-title">

                <i class="fas fa-users"></i>
                Students List

            </h3>

            <a href="/admin/students/create" class="btn btn-primary">

                <i class="fas fa-user-plus"></i>
                Add Student

            </a>

        </div>

    </div>

    <div class="card-body table-responsive p-0">

        <table class="table table-hover text-nowrap">

            <thead class="bg-light">

                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Parent Name</th>
                    <th>Mobile</th>
                    <th>Class</th>
                    <th width="180">Actions</th>
                </tr>

            </thead>

            <tbody>

                @forelse($students as $student)

                <tr>

                    <td>

                        <span class="badge badge-primary">

                            #{{ $student->id }}

                        </span>

                    </td>

                    <td>

                        <div class="d-flex align-items-center">

                            <div class="mr-2">
                                <i class="fas fa-user-graduate text-info fa-lg"></i>
                            </div>

                            <div>
                                <strong>{{ $student->name }}</strong>
                            </div>

                        </div>

                    </td>

                    <td>

                        <i class="fas fa-user text-secondary"></i>

                        {{ $student->parent_name }}

                    </td>

                    <td>

                        <i class="fas fa-phone-alt text-success"></i>

                        {{ $student->parent_mobile }}

                    </td>

                    <td>

                        <span class="badge badge-success p-2">

                            {{ $student->class }}

                        </span>

                    </td>

                    <td>

                        <a
                            href="/admin/students/{{ $student->id }}/edit"
                            class="btn btn-warning btn-sm"
                        >

                            <i class="fas fa-edit"></i>
                            Edit

                        </a>

                        <form
                            action="/admin/students/{{ $student->id }}"
                            method="POST"
                            class="d-inline"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this student?')"
                            >

                                <i class="fas fa-trash"></i>
                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center py-5 text-muted">

                        <i class="fas fa-folder-open fa-3x mb-3"></i>

                        <br>

                        No Students Found

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- Summary Cards -->

<div class="row mt-3">

    <div class="col-md-4">

        <div class="info-box shadow-sm">

            <span class="info-box-icon bg-primary">
                <i class="fas fa-users"></i>
            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Total Students
                </span>

                <span class="info-box-number">
                    {{ count($students) }}
                </span>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="info-box shadow-sm">

            <span class="info-box-icon bg-success">
                <i class="fas fa-school"></i>
            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Classes
                </span>

                <span class="info-box-number">
                    {{ $students->pluck('class')->unique()->count() }}
                </span>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="info-box shadow-sm">

            <span class="info-box-icon bg-warning">
                <i class="fas fa-phone"></i>
            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Parent Contacts
                </span>

                <span class="info-box-number">
                    {{ count($students) }}
                </span>

            </div>

        </div>

    </div>

</div>

@stop