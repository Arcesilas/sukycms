const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
require('laravel-mix-purgecss');

/**
 * ADMIN ASSETS
 */
mix.js('resources/js/admin/admin.js', 'build');
mix.sass('resources/sass/admin/admin.scss', 'build').options({
    processCssUrls: false,
    postCss: [ tailwindcss('tailwind.config.js') ],
}).purgeCss({
    enabled: true,
    extensions: ['php'],
});

/**
 * AUTH ASSETS
 */
mix.js('resources/js/auth/auth.js', 'build');
mix.sass('resources/sass/auth/auth.scss', 'build').options({
    processCssUrls: false,
    postCss: [ tailwindcss('tailwind.config.js') ],
}).purgeCss({
    enabled: true,
    extensions: ['php'],
    globs: [
        path.join(__dirname, 'resources/views/admin/**/*.blade.php'),
        path.join(__dirname, 'resources/views/web/**/*.blade.php'),
        path.join(__dirname, 'resources/views/auth/**/*.blade.php'),
    ],
    whitelist: ['open'],
});

mix.version();
