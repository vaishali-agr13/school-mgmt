@extends('adminlte::page')

@section('title', 'Edit Attendance')

@section('content_header')
    <h1>Edit Attendance</h1>
@stop

@section('content')

<div class="card card-primary">

    <div class="card-header">
        <h3 class="card-title">Update Attendance</h3>
    </div>

    <form action="/admin/attendance/{{ $attendance->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <!-- Student -->

            <div class="form-group">

                <label>Student</label>

                <select name="student_id" class="form-control">

                    @foreach($students as $student)

                        <option value="{{ $student->id }}"
                            {{ $attendance->student_id == $student->id ? 'selected' : '' }}>

                            {{ $student->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Date -->

            <div class="form-group">

                <label>Date</label>

                <input
                    type="date"
                    name="date"
                    class="form-control"
                    value="{{ $attendance->date }}"
                >

            </div>

            <!-- Status -->

            <div class="form-group">

                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="Present"
                        {{ $attendance->status == 'Present' ? 'selected' : '' }}>
                        Present
                    </option>

                    <option value="Absent"
                        {{ $attendance->status == 'Absent' ? 'selected' : '' }}>
                        Absent
                    </option>

                </select>

            </div>

        </div>

        <div class="card-footer">

            <button class="btn btn-primary">

                <i class="fas fa-save"></i>
                Update Attendance

            </button>

        </div>

    </form>

</div>

@stop