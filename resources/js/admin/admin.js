require('../bootstrap');

window.Dropzone = require('dropzone');

require('@chenfengyuan/datepicker');
require('@chenfengyuan/datepicker/i18n/datepicker.es-ES');

$(document).ready(function () {
    $('aside.sidebar > a').on('click', function () {
        $(this).toggleClass('open');
        $('.submenu[data-sidebarsubmenu="' + $(this).data('sidebarsubmenu') + '"]').toggleClass('open');
    });

    $('.btn-loading').on('click', function () {
        let button = $(this);
        let icon = button.find('i').first();

        icon.removeClass();
        icon.addClass('fas fa-spinner fa-spin mr-2');
    });

    $('form').on('submit', function () {
        $('.btn-loading').prop('disabled', true);
        return true;
    });

    $('[data-toggle="datepicker"]').datepicker({
        language: 'es-ES',
    });
});

Dropzone.autoDiscover = false;

if ($('.dropzone').length) {
    new Dropzone('.dropzone', {
        url: '/',
        autoProcessQueue: false,
        dictDefaultMessage: 'Arrastre las fotos o haga clic para seleccionarlas'
    });
}



