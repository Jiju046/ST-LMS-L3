@extends('layouts.app')

@section('content')

<div class="container">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <h2 class="ml-2">Image CRUD</h2>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profile Picture</h6>
        </div>
    <div class="card-body">
        <div class="table-responsive">
            <a class="btn btn-success my-4" href="{{ route('images.create') }}">Add</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($images as $image)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $image->name }}</td>
                            <td>
                                <img src="{{ $image->fullUrl }}" alt="{{ $image->name }}" class="img-thumbnail" width="100">
                            </td>
                            <td>
                                <a href="{{ route('images.edit', $image->id) }}" class="text-success"><img src="{{ asset('icons/pen.png') }}" width="25"></a>
        
                                {!! Form::open(['route' => ['images.destroy', $image->id], 'method' => 'DELETE', 'style' => 'display:inline;']) !!}
                                    {!! Form::token() !!}
                                    {!! Form::button('<img src="' . asset('icons/delete.png') . '" width="25">', ['type' => 'submit', 'class' => 'text-danger bg-light border-0', 'onclick' => 'return confirm("Are you sure you want to delete this image?")']) !!}
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center">No Records Found!</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
