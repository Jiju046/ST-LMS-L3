@extends('layouts.app')

@section('content')
    <h1>Book Details</h1>
    <h2 class="text-primary">{{ $book->title }}</h2>
    <p>Available Days: <span class="text-success">{{ $book->available_days }}</span></p>
    <div class="btn-group">
        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-info">Edit</a>
        <a href="{{ route('books.index', $book->id) }}" class="btn btn-sm btn-info mx-3">Home</a>
    </div>
@endsection






