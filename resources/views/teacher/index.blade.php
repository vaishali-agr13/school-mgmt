@extends('adminlte::page')

@section('title', 'Teacher List')

@section('content_header')

<div class="container-fluid mt-4">

    <div class="card shadow-sm">
        
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Teacher List</h4>

            <a href="{{ route('teacher.create') }}" class="btn btn-primary">
                Add Teacher
            </a>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-hover">
                    
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($teachers as $teacher)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>
                                    <span class="badge bg-success">
                                        {{ ucfirst($teacher->role) }}
                                    </span>
                                </td>
                                <td>
                                    {{ $teacher->created_at->format('d M Y') }}
                                </td>
                                <td>

                                    <a href="{{ route('teacher.edit', $teacher->id) }}"
                                    class="btn btn-sm btn-primary">
                                        Edit
                                    </a>

                                    <a href="{{ route('teacher.delete', $teacher->id) }}"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this teacher?')">
                                        Delete
                                    </a>

                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center text-danger">
                                    No Teachers Found
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection