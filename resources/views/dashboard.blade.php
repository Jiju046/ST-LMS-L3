@extends('layouts.layout')
@section('title', 'Dashboard')
    
@section('content')
    
    <div class="conatiner p-3 shadow rounded">
                        
        @if(auth()->user()->isAdmin())
            <!-- Content for Admin -->
            <h4>Welcome, Admin!</h4>
            <h6>This is the admin dashboard.</h6>
            <br>
            <ul style="list-style-type: none">
                <li><a href="{{ route('books.index') }}" class="btn btn-primary mb-3">Book CRUD operations</a></li>
                <li><a href="{{ route('booking-details.index') }}" class="btn btn-primary">Booking Details</a></li>
            </ul>
        @else
            <!-- Content for Regular User -->
            <h4>Welcome, User!</h4>
            <h6>This is the user dashboard.</h6>

            <br>

            <ul style="list-style-type: none">
                <li><a href="{{ route('booking.index') }}" class="btn btn-primary">Book Library Books</a></li>
            </ul>
        @endif

    </div>  

@endsection
