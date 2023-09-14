@extends('layouts.book')

@section('content')
<div class="container">
    <h1>Book List</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Available Days</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->available_days }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                        {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'DELETE', 'style' => 'display: inline;']) !!}
                            {!! Form::token() !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure you want to delete this book?")']) !!}
                        {!! Form::close() !!}

                    </td>
                </tr>
            
            @empty
                
            <td colspan="3" class="text-center">No Records Found</td>
            @endforelse
        </tbody>
    </table>
    
    <a href="{{ route('books.create') }}" class="btn btn-success">Add Book</a>
</div>

<div>
    <a href="{{ route('dashboard') }}" class="btn btn-primary my-5">Dashboard</a>
</div>
@endsection
