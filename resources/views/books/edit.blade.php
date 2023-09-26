@extends('layouts.app')
@section('title', 'Edit Book Details')
@section('content')

<div class="container p-4 shadow">

    {!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'PATCH', 'class' => 'form']) !!}
    @method('PATCH')

    @include('books/form', ['book' => $book])

    {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    {!! Form::close() !!}
</div>

{{-- js --}}
<script src="{{ asset('js/check-all.js') }}"></script>
@endsection
