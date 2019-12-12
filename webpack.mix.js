const mix = require('laravel-mix');

/**
 * ADMIN ASSETS
 */
mix.js('resources/js/admin/admin.js', 'build');
mix.sass('resources/sass/admin/admin.scss', 'build');

/**
 * AUTH ASSETS
 */
mix.js('resources/js/auth/auth.js', 'build');
mix.sass('resources/sass/auth/auth.scss', 'build');

mix.version();
