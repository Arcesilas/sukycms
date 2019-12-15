window.jQuery = window.$ = require('jquery');
window.Swal = require('sweetalert2');
import tippy from 'tippy.js';

tippy('[data-tooltip]', {
    content(reference) {
        return reference.dataset.tooltip;
    }
});
