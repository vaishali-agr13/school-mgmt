@extends('adminlte::page')

@section('title', 'Fees Management')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <h1 class="m-0 text-dark">
        <i class="fas fa-money-bill-wave text-success"></i>
        Fees Management
    </h1>

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Fees</li>
    </ol>

</div>

@stop

@section('content')

<div class="row">

    <!-- Fees Form -->

    <div class="col-md-4">

        <div class="card card-success card-outline shadow">

            <div class="card-header">

                <h3 class="card-title">
                    <i class="fas fa-plus-circle"></i>
                    Add Student Fees
                </h3>

            </div>

            <form action="/admin/fees" method="POST">

                @csrf

                <div class="card-body">

                    <!-- Student -->

                    <div class="form-group">

                        <label>
                            <i class="fas fa-user-graduate"></i>
                            Select Student
                        </label>

                        <select name="student_id" class="form-control" required>

                            <option value="">Choose Student</option>

                            @foreach($students as $student)

                                <option value="{{ $student->id }}">
                                    {{ $student->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Month -->

                    <div class="form-group">

                        <label>
                            <i class="fas fa-calendar-alt"></i>
                            Month
                        </label>

                        <input
                            type="text"
                            name="month"
                            class="form-control"
                            placeholder="Enter Month"
                            required
                        >

                    </div>

                    <!-- Amount -->

                    <div class="form-group">

                        <label>
                            <i class="fas fa-rupee-sign"></i>
                            Amount
                        </label>

                        <input
                            type="number"
                            name="amount"
                            class="form-control"
                            placeholder="Enter Amount"
                            required
                        >

                    </div>

                    <!-- Status -->

                    <div class="form-group">

                        <label>
                            <i class="fas fa-info-circle"></i>
                            Payment Status
                        </label>

                        <select name="status" class="form-control" required>

                            <option value="Paid">
                                ✅ Paid
                            </option>

                            <option value="Pending">
                                ❌ Pending
                            </option>

                        </select>

                    </div>

                </div>

                <div class="card-footer text-right">

                    <button type="submit" class="btn btn-success">

                        <i class="fas fa-save"></i>
                        Save Fees

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Fees Table -->

    <div class="col-md-8">

        <div class="card card-primary card-outline shadow">

            <div class="card-header">

                <h3 class="card-title">
                    <i class="fas fa-list"></i>
                    Fees Records
                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap">

                    <thead class="bg-light">

                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Month</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($fees as $key => $fee)

                        <tr>

                            <td>
                                <span class="badge badge-primary">
                                    {{ $key + 1 }}
                                </span>
                            </td>

                            <td>

                                <div class="d-flex align-items-center">

                                    <i class="fas fa-user-graduate text-info mr-2"></i>

                                    {{ $fee->student->name }}

                                </div>

                            </td>

                            <td>
                                {{ $fee->month }}
                            </td>

                            <td>

                                <span class="badge badge-success p-2">

                                    ₹ {{ $fee->amount }}

                                </span>

                            </td>

                            <td>

                                @if($fee->status == 'Paid')

                                    <span class="badge badge-success">

                                        ✅ Paid

                                    </span>

                                @else

                                    <span class="badge badge-danger">

                                        ❌ Pending

                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="text-center text-muted py-4">

                                <i class="fas fa-folder-open fa-2x mb-2"></i>

                                <br>

                                No Fees Records Found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- Summary Section -->

<div class="row mt-3">

    <div class="col-md-6">

        <div class="info-box shadow-sm">

            <span class="info-box-icon bg-success">
                <i class="fas fa-money-check-alt"></i>
            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Total Fees Records
                </span>

                <span class="info-box-number">
                    {{ count($fees) }}
                </span>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="info-box shadow-sm">

            <span class="info-box-icon bg-danger">
                <i class="fas fa-exclamation-circle"></i>
            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Pending Payments
                </span>

                <span class="info-box-number">
                    {{ $fees->where('status', 'Pending')->count() }}
                </span>

            </div>

        </div>

    </div>

</div>

@stop