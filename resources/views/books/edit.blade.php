@extends('layouts.book')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>
        {!! Form::model($book, ['route' => ['books.update', $book->id], 'method' => 'PATCH']) !!}
            @method('PATCH')

            <!-- title -->
            <div class="form-group">
                {!! Form::label('title', 'Book Title:') !!}
                {!! Form::text('title', $book->title, ['class' => 'form-control']) !!}
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- available -->
            <div class="form-group">
                {!! Form::label('available_days', 'Available Days:') !!}<br>
                <label>
                    {!! Form::checkbox('available_days', 'All', $book->available_days === 'All', ['class' => 'check-all']) !!} All
                </label><br>
                @foreach(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                    <label>
                        {!! Form::checkbox('available_days[]', $day, in_array($day, explode(',', $book->available_days)), ['class' => 'day-checkbox']) !!} {{ $day }}
                    </label><br>
                @endforeach
                @error('available_days')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
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
