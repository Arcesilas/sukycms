const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

/**
 * ADMIN ASSETS
 */
mix.js('resources/js/admin/admin.js', 'build');
mix.sass('resources/sass/admin/admin.scss', 'build').options({
    processCssUrls: false,
    postCss: [ tailwindcss('tailwind.config.js') ],
});

/**
 * AUTH ASSETS
 */
mix.js('resources/js/auth/auth.js', 'build');
mix.sass('resources/sass/auth/auth.scss', 'build').options({
    processCssUrls: false,
    postCss: [ tailwindcss('tailwind.config.js') ],
});

mix.version();
