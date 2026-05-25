@extends('adminlte::page')

@section('title', 'Edit Gallery')

@section('content')

<div class="container-fluid mt-3">

    <div class="card">

        <div class="card-header">
            <h3>Edit Gallery</h3>
        </div>

        <div class="card-body">

            <form action="{{ url('/admin/gallery/update/'.$gallery->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Current File
                    </label>

                    <br>

                    @if($gallery->type == 'image')

                        <img src="{{ asset($gallery->file) }}"
                             width="200">

                    @else

                        <video width="300" controls>
                            <source src="{{ asset($gallery->file) }}">
                        </video>

                    @endif

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Change File
                    </label>

                    <input type="file"
                           name="file"
                           class="form-control">

                </div>

                <button type="submit"
                        class="btn btn-success">

                    Update

                </button>

            </form>

        </div>

    </div>

</div>

@endsection