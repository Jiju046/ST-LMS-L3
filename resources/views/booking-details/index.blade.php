@extends('layouts.layout')
@section('title', 'Booking Details')
@section('content')

<div class="container p-4">

    <div class="status-alert"></div>

    <!-- view data -->
    <table class="table shadow">
        <thead class="thead-dark">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    function updateBookingStatus(bookingId, isAccepted) {
        const status = isAccepted ? 'approve' : 'decline';
        const statusCell = $(`button[data-booking-id="${bookingId}"]`).closest('td.status');

        $.ajax({
            type: 'POST',
            url: '{{ route("booking-details.status") }}',
            data: {
                id: bookingId,
                status: status,
            },
            success: function (response) {
                if (response.success) {

                    // status update
                    statusCell.empty().html(status === 'approve' ? '<i class="bi bi-check-circle-fill text-success"></i>&nbspApproved' : '<i class="bi bi-x-circle-fill text-danger"></i>&nbspDeclined');

                } else {
                    $('.status-alert').empty().html('<div class="alert alert-danger">This booking is already approved for another user.</div>');
                    status === 'decline' && statusCell.empty().html('<i class="bi bi-x-circle-fill text-danger"></i>&nbspDeclined');
                }
            },
            error: function () {
                $('.status-alert').html('<div class="alert alert-danger">An error occurred while updating booking status.</div>');
            }
        });
    }
</script>
@endsection
