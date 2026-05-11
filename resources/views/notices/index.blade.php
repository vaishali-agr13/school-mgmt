@extends('adminlte::page')

@section('title', 'Notice Management')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <h1 class="m-0 text-dark">
        <i class="fas fa-bullhorn text-warning"></i>
        Notice Management
    </h1>

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Notices</li>
    </ol>

</div>

@stop

@section('content')

<div class="row">

    <!-- Notice Form -->

    <div class="col-md-4">

        <div class="card card-warning card-outline shadow">

            <div class="card-header">

                <h3 class="card-title">
                    <i class="fas fa-plus-circle"></i>
                    Add New Notice
                </h3>

            </div>

            <form action="/admin/notices" method="POST">

                @csrf

                <div class="card-body">

                    <!-- Title -->

                    <div class="form-group">

                        <label>
                            <i class="fas fa-heading"></i>
                            Notice Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            placeholder="Enter Notice Title"
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
                            placeholder="Enter Notice Description"
                            required
                        ></textarea>

                    </div>

                    <div class="form-group">
                        <label>Notice Date</label>
                        <input type="date" name="date" class="form-control">
                    </div>

                </div>

                <div class="card-footer text-right">

                    <button type="submit" class="btn btn-warning">

                        <i class="fas fa-save"></i>
                        Add Notice

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- Notice Table -->

    <div class="col-md-8">

        <div class="card card-primary card-outline shadow">

            <div class="card-header">

                <h3 class="card-title">
                    <i class="fas fa-list"></i>
                    Notice List
                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap">

                    <thead class="bg-light">

                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($notices as $key => $notice)

                        <tr>

                            <td>

                                <span class="badge badge-primary">

                                    {{ $key + 1 }}

                                </span>

                            </td>

                            <td>

                                <strong>
                                    {{ $notice->title }}
                                </strong>

                            </td>

                            <td>

                                {{ Str::limit($notice->description, 60) }}

                            </td>

                            <td>

                                <span class="badge badge-success p-2">

                                    {{ $notice->date }}

                                </span>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-center text-muted py-4">

                                <i class="fas fa-folder-open fa-2x mb-2"></i>

                                <br>

                                No Notices Available

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- Summary Cards -->

<div class="row mt-3">

    <div class="col-md-6">

        <div class="info-box shadow-sm">

            <span class="info-box-icon bg-warning">
                <i class="fas fa-bullhorn"></i>
            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Total Notices
                </span>

                <span class="info-box-number">
                    {{ count($notices) }}
                </span>

            </div>

        </div>

    </div>

    <div class="col-md-6">

        <div class="info-box shadow-sm">

            <span class="info-box-icon bg-success">
                <i class="fas fa-calendar-alt"></i>
            </span>

            <div class="info-box-content">

                <span class="info-box-text">
                    Latest Notice Date
                </span>

                <span class="info-box-number">

                    @if(count($notices) > 0)

                        {{ $notices->last()->created_at->format('d M Y') }}

                    @else

                        N/A

                    @endif

                </span>

            </div>

        </div>

    </div>

</div>

@stop