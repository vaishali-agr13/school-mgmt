@extends('adminlte::page')

@section('title', 'Gallery List')

@section('content')

<div class="container-fluid mt-3">

    <div class="d-flex justify-content-between mb-3">

        <h3>Gallery List</h3>

        <a href="{{ url('/admin/gallery/create') }}" class="btn btn-primary">
            Add Gallery
        </a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Preview</th>
                        <th>Type</th>
                        <th>File</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($galleries as $gallery)

                    <tr>

                        <td>{{ $gallery->id }}</td>

                        <td>

                            @if($gallery->type == 'image')

                                <img src="{{ asset($gallery->file) }}"
                                     width="120"
                                     height="80"
                                     style="object-fit:cover;">

                            @else

                                <video width="150" height="80" controls>
                                    <source src="{{ asset($gallery->file) }}">
                                </video>

                            @endif

                        </td>

                        <td>
                            {{ ucfirst($gallery->type) }}
                        </td>

                        <td>
                            {{ $gallery->file }}
                        </td>

                        <td>
                            {{ $gallery->created_at->format('d M Y') }}
                        </td>

                        <td class="d-flex align-items-center" style="gap: 8px;">

                            <a href="{{ url('/admin/gallery/edit/'.$gallery->id) }}"
                            class="btn btn-sm btn-primary">

                                Edit

                            </a>

                            <form action="{{ url('/admin/gallery/delete/'.$gallery->id) }}"
                                method="POST"
                                style="margin:0;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            No Gallery Found
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection