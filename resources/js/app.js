import './bootstrap';

import Alpine from 'alpinejs';

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

flatpickr(".datepicker", {
    dateFormat: "Y-m-d", // Customize the date format as needed
    enableTime: false,
});


window.Alpine = Alpine;

Alpine.start();
