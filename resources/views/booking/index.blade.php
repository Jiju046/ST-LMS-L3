<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Book a slot
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">

                                        @if(session('success'))
                                            <div class="alert">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if(session('error'))
                                            <div class="alert-error">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <!-- booking form -->
                                        {!! Form::open(['route' => 'booking.store']) !!}
                                        
                                        <div class="form-group">
                                            {!! Form::label('date', 'Select Date', ['class'=>'label-weight']) !!}
                                            {!! Form::date('date', $date, ['class' => 'datepicker','id' => 'date', 'onchange' => 'loadAvailableBooks()', 'min' => now()->toDateString()]) !!}
                                            @error('date')
                                                <div class="alert-error" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        
                                        <h2><span id="selectedDate"></span></h2>
                                        
                                        <div id="availableBooks">
                                            @error('selected_books')
                                            <div class="alert-error" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>

                                        {!! Form::submit('Submit Selections', ['class' => 'button button-green']) !!}
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
                                            let checkbox = $('<input>').attr({type: 'checkbox', name: 'selected_books[]', value: book.id, class:'books-checkbox',id:book.id });

                                                $('#availableBooks').append(checkbox, $('<label>').attr('for',book.id).text(book.title), '<br>');
                                                    
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
</x-app-layout>
