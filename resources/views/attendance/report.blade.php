@extends('adminlte::page')

@section('title', 'Attendance Report')

@section('content_header')
    <h1>Attendance Report</h1>
@stop

@section('content')

<div class="container-fluid mt-4">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Attendance Report</h4>
        </div>

        <div class="card-body">

            <!-- Date Filter -->
            <form method="GET" class="row mb-4">

                <div class="col-md-3">
                    <input type="date"
                           name="date"
                           value="{{ request('date') }}"
                           class="form-control">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary">
                        Filter
                    </button>
                </div>

            </form>

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead style="background:#e9ecef;">
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($attendances as $attendance)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $attendance->student->name ?? 'N/A' }}
                                </td>

                                <td>
                                    {{ date('d M Y', strtotime($attendance->date)) }}
                                </td>

                                <td>
                                    @if($attendance->status == 'Present')

                                        <span class="badge bg-success">
                                            Present
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Absent
                                        </span>

                                    @endif
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="text-center text-danger">
                                    No Attendance Found
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