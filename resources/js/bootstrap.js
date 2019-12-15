window.jQuery = window.$ = require('jquery');
import tippy from 'tippy.js';

tippy('[data-tooltip]', {
    content(reference) {
        return reference.dataset.tooltip;
    }
});
