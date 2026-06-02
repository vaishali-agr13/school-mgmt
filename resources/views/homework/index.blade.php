@extends('adminlte::page')

@section('title', 'Homework Management')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <h1 class="m-0 text-dark">
        <i class="fas fa-book-open text-primary"></i>
        Homework Management
    </h1>

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Homework</li>
    </ol>

</div>

@stop

@section('content')

<div class="row">

    <!-- Homework Form -->

    <div class="col-md-4">

        <div class="card card-primary card-outline shadow">

            <div class="card-header">

                <h3 class="card-title">
                    <i class="fas fa-upload"></i>
                    Upload Homework
                </h3>

            </div>

            <form action="/admin/homework" method="POST">

                @csrf

                <div class="card-body">

                    <!-- Title -->

                    <div class="form-group">

                        <label>
                            <i class="fas fa-heading"></i>
                            Homework Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            placeholder="Enter Homework Title"
                            required
                        >

                    </div>

                    <!-- Description -->

                    <div class="form-group">

                        <label>
                            <i class="fas fa-align-left"></i>
                            Description
                        </label>

                        <textarea
                            name="description"
                            class="form-control"
                            rows="5"
                            placeholder="Enter Homework Description"
                            required
                        ></textarea>

                    </div>

                    <!-- Class -->

                    <div class="form-group">

                        <label>
                            <i class="fas fa-school"></i>
                            Class
                        </label>

                        <input
                            type="text"
                            name="class"
                            class="form-control"
                            placeholder="Enter Class"
                            required
                        >

                    </div>

                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>

                </div>

                <div class="card-footer text-right">

                    <button type="submit" class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Upload Homework

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Homework Table -->

    <div class="col-md-8">

        <div class="card card-success card-outline shadow">

            <div class="card-header">

                <h3 class="card-title">
                    <i class="fas fa-list"></i>
                    Homework List
                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap">

                    <thead class="bg-light">

                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Class</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($homeworks as $key => $homework)

                        <tr>

                            <td>

                                <span class="badge badge-primary">

                                    {{ $key + 1 }}

                                </span>

                            </td>

                            <td>

                                <strong>
                                    {{ $homework->title }}
                                </strong>

                            </td>

                            <td>

                                {{ Str::limit($homework->description, 50) }}

                            </td>

                            <td>

                                <span class="badge badge-success p-2">

                                    {{ $homework->class }}

                                </span>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-center text-muted py-4">

                                <i class="fas fa-folder-open fa-2x mb-2"></i>

                                <br>

                                No Homework Uploaded Yet

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

            <span class="info-box-icon bg-primary">
                <i class="fas fa-book"></i>
            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Total Homework
                </span>

                <span class="info-box-number">
                    {{ count($homeworks) }}
                </span>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="info-box shadow-sm">

            <span class="info-box-icon bg-success">
                <i class="fas fa-school"></i>
            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Classes Covered
                </span>

                <span class="info-box-number">
                    {{ $homeworks->pluck('class')->unique()->count() }}
                </span>

            </div>

        </div>

    </div>

</div>

@stop