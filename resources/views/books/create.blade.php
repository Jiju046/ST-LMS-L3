@extends('layouts.layout')
@section('title', 'Create Book')
@section('content')

<div class="container p-4 shadow">
    {!! Form::open(['route' => 'books.store', 'method' => 'POST', 'class' => 'form']) !!}

    <!-- title -->
    <div class="mb-3">
        {!! Form::label('title', 'Book Title:', ['class' => 'label-weight']) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- available -->
    <div class="mb-3">
        {!! Form::label('available_days', 'Available Days:', ['class' => 'label-weight']) !!}
        <br>
        <label>
            {!! Form::checkbox('available_days', 'All', false, ['class' => 'check-all']) !!} All
        </label><br>

        @foreach(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
        <label>
            {!! Form::checkbox('available_days['.$day.']', $day, false, ['class' => 'day-checkbox']) !!} {{ $day }}
        </label><br>
        @endforeach

        @error('available_days')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    {!! Form::submit('Create', ['class' => 'btn btn-success']) !!}
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>

    {!! Form::close() !!}
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const checkAllCheckbox = $('.check-all');
        const dayCheckboxes = $('.day-checkbox');

        checkAllCheckbox.on('change', function() {
            dayCheckboxes.prop('checked', $(this).prop('checked'));
        });

        dayCheckboxes.on('change', function() {
            if (!$(this).prop('checked')) {
                checkAllCheckbox.prop('checked', false);
            } else {
                const allChecked = dayCheckboxes.toArray().every(function(dayCheckbox) {
                    return $(dayCheckbox).prop('checked');
                });
                checkAllCheckbox.prop('checked', allChecked);
            }
        });
    });
</script>

@endsection
