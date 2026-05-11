@extends('adminlte::page')

@section('title', 'Attendance Management')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <h1 class="m-0 text-dark">
        <i class="fas fa-calendar-check text-primary"></i>
        Attendance Management
    </h1>

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Attendance</li>
    </ol>

</div>

@stop

@section('content')

<div class="card card-primary card-outline shadow">

    <div class="card-header">

        <h3 class="card-title">
            <i class="fas fa-user-check"></i>
            Mark Student Attendance
        </h3>

    </div>

    <form action="/admin/attendance" method="POST">

        @csrf

        <div class="card-body table-responsive p-0">

            <table class="table table-hover text-nowrap mb-0">

                <thead class="bg-light">

                    <tr>
                        <th width="10%">#</th>
                        <th>Student Name</th>
                        <th width="30%">Attendance Status</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($students as $key => $student)

                    <tr>

                        <td>
                            <span class="badge badge-primary">
                                {{ $key + 1 }}
                            </span>
                        </td>

                        <td>

                            <div class="d-flex align-items-center">

                                <div class="mr-2">
                                    <i class="fas fa-user-graduate fa-lg text-info"></i>
                                </div>

                                <div>
                                    <strong>{{ $student->name }}</strong>
                                </div>

                            </div>

                        </td>

                        <td>

                           <select name="status[{{ $student->id }}]" class="form-control">

                                <option value="Present"
                                    {{ isset($student->attendance) && $student->attendance->status == 'Present' ? 'selected' : '' }}>
                                    ✅ Present
                                </option>

                                <option value="Absent"
                                    {{ isset($student->attendance) && $student->attendance->status == 'Absent' ? 'selected' : '' }}>
                                    ❌ Absent
                                </option>

                            </select>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="card-footer text-right">

            <button type="submit" class="btn btn-primary">

                <i class="fas fa-save"></i>
                Save Attendance

            </button>

        </div>

    </form>

</div>

<!-- Summary Cards -->

<div class="row mt-4">

    <div class="col-md-6">

        <div class="info-box shadow-sm">

            <span class="info-box-icon bg-success">
                <i class="fas fa-user-check"></i>
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

    <div class="col-md-6">

        <div class="info-box shadow-sm">

            <span class="info-box-icon bg-warning">
                <i class="fas fa-clock"></i>
            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Attendance Date
                </span>

                <span class="info-box-number">
                    {{ date('d M Y') }}
                </span>

            </div>

        </div>

    </div>

</div>

@stop