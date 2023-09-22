@extends('layouts.layout')
@section('title', 'Books CRUD')
@section('content')

<div class="container p-4">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table shadow">
        <thead class="thead-dark">
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
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-info">Edit</a>
                    {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'DELETE', 'style' => 'display: inline;']) !!}
                    {!! Form::token() !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure you want to delete this book?")']) !!}
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

    <a href="{{ route('books.create') }}" class="btn btn-success">Add Book</a>
</div>

@endsection
