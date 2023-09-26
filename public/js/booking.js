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