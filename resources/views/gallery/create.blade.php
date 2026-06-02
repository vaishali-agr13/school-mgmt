@extends('adminlte::page')

@section('title', 'Create Gallery')

@section('content')

<div class="container-fluid mt-3">

    <div class="card card-primary">

        <div class="card-header">
            <h3 class="card-title">Upload Gallery</h3>
        </div>

        <form action="{{ url('/admin/gallery/store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="card-body">

                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        {{ session('success') }}

                        <button type="button"
                                class="close"
                                data-dismiss="alert">

                            <span>&times;</span>

                        </button>

                    </div>

                @endif

                <div class="form-group">

                    <label>
                        Select Images / Videos
                    </label>

                    <input type="file"
                           name="files[]"
                           class="form-control"
                           multiple required>

                    @error('files.*')

                        <span class="text-danger">
                            {{ $message }}
                        </span>

                    @enderror

                </div>

            </div>

            <div class="card-footer">

                <button type="submit"
                        class="btn btn-primary">

                    Upload

                </button>

                <a href="{{ url('/admin/gallery') }}"
                   class="btn btn-secondary">

                    Back

                </a>

            </div>

        </form>

    </div>

</div>

@endsection