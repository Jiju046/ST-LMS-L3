<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Book
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        {!! Form::open(['route' => 'books.store', 'method' => 'POST']) !!}

                        <!-- title -->
                        <div>
                            {!! Form::label('title', 'Book Title:') !!}
                            {!! Form::text('title', null, ['class' => 'text-input']) !!}
                            @error('title')
                                <div class="alert-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- available -->
                        <div>
                            {!! Form::label('available_days', 'Available Days:') !!}<br>
                            <label>
                                {!! Form::checkbox('available_days', 'All', false, ['class' => 'check-all']) !!} All
                            </label><br>

                            @foreach(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day)
                                <label>
                                    {!! Form::checkbox('available_days['.$day.']', $day, false, ['class' => 'day-checkbox']) !!} {{ $day }}
                                </label><br>
                            @endforeach

                            @error('available_days')
                                <div class="alert-error">{{ $message }}</div>
                            @enderror
                        </div>

                        
                        {!! Form::submit('Create', ['class' => 'button button-green']) !!}
                        <a href="{{ route('books.index') }}" class="button">Cancel</a> 

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
    
</x-app-layout>
