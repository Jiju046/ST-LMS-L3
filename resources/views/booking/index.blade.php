@extends('layouts.book')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book a Slot</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- booking form -->
                    {!! Form::open(['route' => 'booking.store']) !!}
                    
                    <div class="form-group">
                        {!! Form::label('date', 'Select Date') !!}
                        {!! Form::date('date', $date, ['class' => 'form-control datepicker','id' => 'date', 'onchange' => 'loadAvailableBooks()', 'min' => now()->toDateString()]) !!}
                        @error('date')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <h2 class="my-3"><span id="selectedDate"></span></h2>
                    
                    <div class="my-3" id="availableBooks">
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
            <a href="{{ route('dashboard') }}" class="btn btn-primary my-3 w-10">Dashboard</a>
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
                        let checkbox = $('<input>').attr({type: 'checkbox', name: 'selected_books[]', value: book.id });

                            $('#availableBooks').append(checkbox, $('<label>').text(book.title), '<br>');
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