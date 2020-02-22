require('../bootstrap');

window.Dropzone = require('dropzone');
window.MicroModal = require('micromodal/dist/micromodal.min');

require('@chenfengyuan/datepicker');
require('@chenfengyuan/datepicker/i18n/datepicker.es-ES');

$(document).ready(function () {
    MicroModal.init({
        disableScroll: true,
    });

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

    $('[data-toggle="show"]').on('click', function () {
        const icon = $(this).find('i');
        const item = $($(this).data('item'));

        icon.toggleClass('fa-plus-square');
        icon.toggleClass('fa-minus-square');

        item.toggleClass('hidden');
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



