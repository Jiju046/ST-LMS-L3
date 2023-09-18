<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Booking Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                               
                                        
                                <div class="status-alert"></div>
                                    
                                    <!-- view data -->
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Books</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse($bookings as $booking)
                                                <tr>
                                                    <td>{{ $booking->user->name }}</td>
                                                    <td>{{ $booking->book->title }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}</td>
                                                    <td class="status">
                                                        @if (auth()->user()->isAdmin())
                                                        @if ($booking->approved)
                                                            <i class="bi bi-check-circle-fill accept-icon"></i>&nbspApproved
                                                        @elseif($booking->approved === 0)
                                                            <i class="bi bi-x-circle-fill decline-icon"></i>&nbspDeclined
                                                        @else
                                                        
                                                            <button class="button button-green" data-booking-id="{{ $booking->id }}" onclick="updateBookingStatus({{ $booking->id }}, true)">Approve</button>
                                                            <button class="button button-red" data-booking-id="{{ $booking->id }}" onclick="updateBookingStatus({{ $booking->id }}, false)">Decline</button>

                                                        @endif
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <td colspan="4" class="center-text">No Booking Found!</td>
                                            @endforelse
                                        </tbody>
                                    </table>

                                <a href="{{ route('dashboard') }}" class="button button-cyan margin-y">Dashboard</a>
                            </div>
                        </div>
                    </div>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                    <script>
                        
                        function updateBookingStatus(bookingId, isAccepted) {
                        const status = isAccepted ? 'approve' : 'decline';

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
                                    const statusCell = $(`button[data-booking-id="${bookingId}"]`).closest('td.status');
                                    statusCell.empty().html(status === 'approve' ? '<i class="bi bi-check-circle-fill accept-icon"></i>&nbspApproved' : '<i class="bi bi-x-circle-fill decline-icon"></i>&nbspDeclined');
                            
                                } else {
                                    $('.status-alert').html('<div class="alert-error">Failed to update booking status.</div>');
                                }
                            },
                            error: function () {
                                $('.status-alert').html('<div class="alert-error">An error occurred while updating booking status.</div>');
                            }
                        });
                    }


                    </script>

</x-app-layout>
