@props(['book' => null]) <!-- default values -->
 
 <!-- title -->
 <div class="mb-3">
    {!! Form::label('title', 'Book Title:', ['class' => 'label-weight']) !!}
    {!! Form::text('title', $book->title, ['class' => 'form-control']) !!}
</div>
@error('title')
<div class="alert alert-danger">{{ $message }}</div>
@enderror

<!-- available -->
<div class="mb-3">
    {!! Form::label('available_days', 'Available Days:', ['class' => 'label-weight']) !!}<br>
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