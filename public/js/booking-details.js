function updateBookingStatus(bookingId, isAccepted) {
    const status = isAccepted ? 'approve' : 'decline';
    const statusCell = $(`button[data-booking-id="${bookingId}"]`).closest('td.status');

    $.ajax({
        type: 'POST',
        url: '/booking-details/status',
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