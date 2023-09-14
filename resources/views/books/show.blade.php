@extends('layouts.book')

@section('content')
<div class="container">
    <h1>Book Details</h1>
    <p><strong>Title:</strong> {{ $book->title }}</p>
    <p><strong>Available Days:</strong> {{ $book->available_days }}</p>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
