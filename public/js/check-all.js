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