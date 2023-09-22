@extends('layouts.layout')
@section('title', 'View Book Details')
@section('content')

<div class="container p-4 shadow">

    <p><strong>Title:</strong> {{ $book->title }}</p>
    <p><strong>Available Days:</strong> {{ $book->available_days }}</p>
    <a href="{{ route('books.index') }}" class="btn btn-success">Back to List</a>
</div>

@endsection