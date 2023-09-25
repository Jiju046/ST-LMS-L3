@extends('layouts.layout')
@section('title', 'Books CRUD')
@section('content')

<div class="container p-4">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

   
    
    <!-- DataTables-->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List of Books</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Available Days</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->available_days }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}"><img src="{{ asset('images/eye.png') }}" width="35"></a>&nbsp;
                            <a href="{{ route('books.edit', $book->id) }}"><img src="{{ asset('images/pen.png') }}" width="25"></a>
                            {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'DELETE', 'style' => 'display: inline;']) !!}
                                {!! Form::token() !!}
                                {!! Form::button('<img src="' . asset('images/delete.png') . '" width="25">', [
                                    'type' => 'submit',
                                    'style' => 'border: none; background-color: white;',
                                    'onclick' => 'return confirm("Are you sure you want to delete this book?")',
                                ]) !!}
                            {!! Form::close() !!}

                            
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">No Records Found</td>
                    </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
        

    <a href="{{ route('books.create') }}" class="btn btn-success">Add Book</a>
</div>

@endsection
