@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0 text-dark">Dashboard</h1>

        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
@stop

@section('content')

<div class="row">

    <!-- Total Students -->
    <div class="col-lg-4 col-md-6 col-sm-12">

        <div class="small-box bg-info shadow">

            <div class="inner">
                <h3>{{ $students }}</h3>
                <p>Total Students</p>
            </div>

            <div class="icon">
                <i class="fas fa-user-graduate"></i>
            </div>

            <a href="/admin/students" class="small-box-footer">
                More Info <i class="fas fa-arrow-circle-right"></i>
            </a>

        </div>

    </div>

    <!-- Attendance -->
    <div class="col-lg-4 col-md-6 col-sm-12">

        <div class="small-box bg-success shadow">

            <div class="inner">
                <h3>{{ $todayAttendance }}</h3>
                <p>Today's Attendance</p>
            </div>

            <div class="icon">
                <i class="fas fa-calendar-check"></i>
            </div>

            <a href="/admin/attendance" class="small-box-footer">
                More Info <i class="fas fa-arrow-circle-right"></i>
            </a>

        </div>

    </div>

    <!-- Pending Fees -->
      @if(auth()->user()->role == 'admin')
    <div class="col-lg-4 col-md-6 col-sm-12">

        <div class="small-box bg-danger shadow">

            <div class="inner">
                <h3>{{ $pendingFees }}</h3>
                <p>Pending Fees</p>
            </div>

            <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>

            <a href="/admin/fees" class="small-box-footer">
                More Info <i class="fas fa-arrow-circle-right"></i>
            </a>

        </div>

    </div>
    @endif

</div>

<!-- Recent Activity Section -->

<div class="row">

    <div class="col-md-8">

        <div class="card card-primary card-outline">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-line mr-1"></i>
                    School Overview
                </h3>
            </div>

            <div class="card-body">

                <div class="row text-center">

                    <div class="col-md-4 border-right">
                        <h4 class="text-primary">{{ $students }}</h4>
                        <p>Total Students</p>
                    </div>

                    <div class="col-md-4 border-right">
                        <h4 class="text-success">{{ $todayAttendance }}</h4>
                        <p>Present Today</p>
                    </div>

                         {{-- Admin Only Fees Section --}}
                    @if(auth()->user()->role == 'admin')
                    <div class="col-md-4">
                        <h4 class="text-danger">{{ $pendingFees }}</h4>
                        <p>Pending Fees</p>
                    </div>
                    @endif

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card card-success card-outline">

            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-bell"></i>
                    Quick Actions
                </h3>
            </div>

            <div class="card-body">

                <a href="/admin/students" class="btn btn-primary btn-block mb-2">
                    <i class="fas fa-user-plus"></i> Add Student
                </a>

                <a href="/admin/attendance" class="btn btn-success btn-block mb-2">
                    <i class="fas fa-calendar-check"></i> Take Attendance
                </a>

                {{-- Admin Only Fees Section --}}
                @if(auth()->user()->role == 'admin')

                <a href="/admin/fees" class="btn btn-danger btn-block">
                    <i class="fas fa-money-check-alt"></i> Manage Fees
                </a>
                @endif
            </div>

        </div>

    </div>

</div>

@stop