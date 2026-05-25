@extends('adminlte::page')

@section('title', 'All Classes')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-dark">All Classes</h1>

        <a href="{{ route('classes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Class
        </a>
    </div>
@stop

@section('content')

@if(session('success'))
    <div  id='successMessage' class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}

        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

<div class="card card-outline card-primary">

    <div class="card-header bg-light">
        <h3 class="card-title text-dark">
            <i class="fas fa-school"></i> Classes List
        </h3>
    </div>

    <div class="card-body table-responsive p-0">

        <table class="table table-hover">
            <thead class="bg-light">
                <tr>
                    <th>ID</th>
                    <th>Class</th>
                    <th>Fees</th>
                    <th>Teacher</th>
                    <th>Age</th>
                    <th>Time</th>
                    <th>Capacity</th>
                    <th width="150">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($classes as $class)
                <tr>
                    <td>{{ $class->id }}</td>

                    <td>{{ $class->class_name }}</td>

                    <td>
                        <span class="badge badge-info">
                            ₹ {{ $class->fees }}
                        </span>
                    </td>

                    <td>{{ $class->teacher_name }}</td>

                    <td>{{ $class->age }}</td>

                    <td>{{ $class->time }}</td>

                    <td>
                        <span class="badge badge-success">
                            {{ $class->capacity }}
                        </span>
                    </td>

                    <td>
                        <a href="{{ route('classes.edit', $class->id) }}"
                           class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form action="{{ route('classes.destroy', $class->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this class?')">
                                <i class="fas fa-trash"></i>
                            </button>

                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-3">
                        No Classes Found
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

@stop

@section('js')
<script>
    setTimeout(function () {
        let successBox = document.getElementById('successMessage');

        if (successBox) {
            successBox.style.transition = "0.5s";
            successBox.style.opacity = "0";
            
            setTimeout(() => {
                successBox.remove();
            }, 500);
        }
    }, 3000); // 3 seconds
</script>
@stop