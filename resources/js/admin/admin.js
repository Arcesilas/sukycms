require('../bootstrap');
require('tinymce');

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
                if ($(this).is('form')) {
                    $(this).unbind('submit').submit();
                } else {
                    $(this).unbind('click').click();
                }
            }
        })
    });

    $('.select-other-and-confirm').on('click submit', function (e) {
        e.preventDefault();
        Swal.fire({
            title: SukyCMS.lang.confirm.title,
            text: 'Va a eliminar Refugio, por favor, seleccione una nueva localización para los 19 animales que se encuentran en Refugio.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: SukyCMS.lang.confirm.confirmButtonText,
            cancelButtonText: SukyCMS.lang.confirm.cancelButtonText,
            input: 'select',
            inputOptions: SukyCMS.selectOtherAndDestroy.options,
        }).then((result) => {
            if (result.value) {
                if ($(this).is('form')) {
                    $(this).append(`<input type="hidden" name="model_id" value="${result.value}" />`);
                    $(this).unbind('submit').submit();
                } else {
                    $(this).unbind('click').click();
                }
            }
        })
    });

    $('form .hidden[data-select-toggle] input').attr('disabled', true);

    let selectToggle = $('select.select-toggle');
    if (selectToggle.val()) {
        const name = selectToggle.attr('name');
        const value = selectToggle.val();
        let target = $(`[data-select-toggle="${value}"]`);

        $(`[data-select-toggle="${value}"] input`).removeAttr('disabled');
        $(`[data-select-toggle-parent="${name}"]`).addClass('hidden');
        target.toggleClass('hidden');
    }

    selectToggle.on('change', function () {
        const name = $(this).attr('name');
        const value = $(this).val();
        let target = $(`[data-select-toggle="${value}"]`);

        $(`[data-select-toggle-parent="${name}"]`).addClass('hidden');
        $(`[data-select-toggle-parent="${name}"] input`).attr('disabled', true);
        $(`[data-select-toggle="${value}"] input`).removeAttr('disabled');
        target.toggleClass('hidden');
    });

    // IS FORM CHANGED
    let _isDirty = false;
    let _submitted = false;

    $('form').on('submit', function () {
        _submitted = true;

        let button = $('.btn-loading');
        let icon = button.find('i').first();

        icon.removeClass();
        icon.addClass('fas fa-spinner fa-spin mr-2');

        button.prop('disabled', true);
        return true;
    });

    $(':input').change(function () {
        let form = $(this).closest('form');

        if (form.prop('method') !== 'get') {
            _isDirty = true;
        }
    });

    onbeforeunload = function (e) {
        if (_isDirty && ! _submitted) {
            return '¿Estás seguro? Se perderán los cambios.';
        }
    };

    onunload = function (e) {
        if (_isDirty && ! _submitted) {
            confirm('¿Estás seguro? Se perderán los cambios.');
        }
    };
});

Dropzone.autoDiscover = false;

if ($('.dropzone').length) {
    new Dropzone('.dropzone', {
        url: '#',
        paramName: 'attachments[]',
        uploadMultiple: true,
        maxFilesize: 5,
        autoProcessQueue: false,
        dictDefaultMessage: 'Arrastre las fotos o haga clic para seleccionarlas'
    });
}



