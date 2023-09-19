<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    
                @if(auth()->user()->isAdmin())
                    <!-- Content for Admin -->
                    <h1 class="text-green-500">Welcome, Admin!</h1>
                    <h3>This is the admin dashboard.</h3>
                    <br>
                    <ul>
                        <li><a href="{{ route('books.index') }}" class="text-blue-500 hover:text-blue-700 hover:underline button button-dashboard">Book CRUD operations</a></li>
                        <li><a href="{{ route('booking-details.index') }}" class="text-blue-500 hover:text-blue-700 hover:underline button button-dashboard">Booking Details</a></li>
                    </ul>
                @else
                    <!-- Content for Regular User -->
                    <h1 class="text-green-500">Welcome, User!</h1>
                    <h3>This is the user dashboard.</h3>

                    <br>

                    <ul>
                        <li><a href="{{ route('booking.index') }}" class="text-blue-500 hover:text-blue-700 hover:underline button button-dashboard">Book Library Books</a></li>
                    </ul>
                @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
