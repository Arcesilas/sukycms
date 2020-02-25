require('../bootstrap');

window.Dropzone = require('dropzone');
window.MicroModal = require('micromodal/dist/micromodal.min');

require('jquery-datetimepicker');

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

        if (button.parents('form').length) {
            return;
        }

        let icon = button.find('i').first();

        icon.removeClass();
        icon.addClass('fas fa-spinner fa-spin mr-2');
    });

    $('form').on('submit', function () {
        let button = $('.btn-loading');
        let icon = button.find('i').first();

        icon.removeClass();
        icon.addClass('fas fa-spinner fa-spin mr-2');

        button.prop('disabled', true);
        return true;
    });

    $.datetimepicker.setLocale('es');
    $('[data-toggle="datepicker"]').datetimepicker({
        format: SukyCMS.dateFormat,
        timepicker: false,
    });

    $('[data-toggle="datetimepicker"]').datetimepicker({
        format: SukyCMS.datetimeFormat,
    });

    $('[data-toggle="show"]').on('click', function () {
        const icon = $(this).find('i');
        const item = $($(this).data('item'));

        icon.toggleClass('fa-plus-square');
        icon.toggleClass('fa-minus-square');

        item.toggleClass('hidden');
    });

    $('.confirm').on('click submit', function (e) {
        e.preventDefault();
        Swal.fire({
            title: SukyCMS.lang.confirm.title,
            text: SukyCMS.lang.confirm.text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: SukyCMS.lang.confirm.confirmButtonText,
            cancelButtonText: SukyCMS.lang.confirm.cancelButtonText,
        }).then((result) => {
            if (result.value) {
                $(this).unbind('submit').submit();
            }
        })
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



