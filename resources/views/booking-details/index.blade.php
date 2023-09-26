@extends('layouts.app')
@section('title', 'Booking Details')
@section('content')

<div class="container p-4">

    <div class="status-alert"></div>

    <!-- view data -->
    <!-- DataTables-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of Books</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Books</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->book->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}</td>
                            <td class="status">
                                @if (auth()->user()->isAdmin())
                                @if ($booking->approved)
                                <i class="bi bi-check-circle-fill accept-icon text-success"></i>&nbspApproved
                                @elseif($booking->approved === 0)
                                <i class="bi bi-x-circle-fill decline-icon text-danger"></i>&nbspDeclined
                                @else
            
                                <button class="btn btn-success" data-booking-id="{{ $booking->id }}" onclick="updateBookingStatus({{ $booking->id }}, true)">Approve</button>
                                <button class="btn btn-danger" data-booking-id="{{ $booking->id }}" onclick="updateBookingStatus({{ $booking->id }}, false)">Decline</button>
            
                                @endif
                                @else
                                N/A
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No Booking Found!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/booking-details.js') }}"></script>
@endsection
