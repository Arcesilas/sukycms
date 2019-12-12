const mix = require('laravel-mix');

/**
 * AUTH ASSETS
 */
mix.js('resources/js/auth/auth.js', 'build');
mix.sass('resources/sass/auth/auth.scss', 'build');

mix.version();
