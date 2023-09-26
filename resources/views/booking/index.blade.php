@extends('layouts.app')
@section('title', 'Book a slot')
    
@section('content')

<div class="container p-4 shadow rounded">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- booking form -->
            {!! Form::open(['route' => 'booking.store', 'class' => 'form']) !!}
            
            <div class="form-group">
                {!! Form::label('date', 'Select Date', ['class' => 'label-weight']) !!}
                {!! Form::date('date', $date, ['class' => 'form-control datepicker', 'id' => 'date', 'onchange' => 'loadAvailableBooks()', 'min' => now()->toDateString()]) !!}
                @error('date')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <h2><span id="selectedDate"></span></h2>

            <div id="availableBooks">
                @error('selected_books')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            {!! Form::submit('Submit Selections', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}

            <div id="my-element" data-route-url="{{ route('booking-details.status') }}"></div>
        </div>
    </div>
</div>

<script src="{{ asset('js/booking.js') }}"></script>
@endsection