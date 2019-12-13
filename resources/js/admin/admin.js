window.jQuery = window.$ = require('jquery');


$('aside.sidebar > a').on('click', function () {
    $(this).toggleClass('open');
    $('.submenu[data-sidebarsubmenu="'+$(this).data('sidebarsubmenu')+'"]').toggleClass('open');
});

