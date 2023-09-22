@extends('layouts.layout')
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

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script>
    function loadAvailableBooks() {
        let selectedDate = $('#date').val();
        let dateParts = selectedDate.split('-');
        let formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`; // Change the format to 'ddmmyyyy'
        
        $.ajax({
            type: 'POST',
            url: '/get-available-books',
            data: { date: selectedDate },
            success: function(response) {
                $('#availableBooks').empty();

                if (response.length > 0) {
                    $.each(response, function(index, book) {
                        let checkbox = $('<input>').attr({ type: 'checkbox', name: 'selected_books[]', value: book.id, class: 'mx-2', id: book.id });
                        $('#availableBooks').append(checkbox, $('<label>').attr('for', book.id).text(book.title), '<br>');
                    });
                } else {
                    $('#availableBooks').html('<p>No available books for this date.</p>');
                }

                $('#selectedDate').text('Available Books for ' + formattedDate);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
</script>
@endsection