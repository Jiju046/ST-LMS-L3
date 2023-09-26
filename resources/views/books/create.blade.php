@extends('layouts.app')
@section('title', 'Create Book')
@section('content')

<div class="container p-4 shadow">
    {!! Form::open(['route' => 'books.store', 'method' => 'POST', 'class' => 'form']) !!}

        @include('books/form', ['book' => $book])

        {!! Form::submit('Create', ['class' => 'btn btn-success']) !!}
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>

    {!! Form::close() !!}
</div>

<script src="{{ asset('js/check-all.js') }}"></script>

@endsection
