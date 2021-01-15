const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/login-main.js', 'public/js')
    .js('resources/js/acceuil.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/idea.scss', 'public/css')
    .sass('resources/sass/homepage.scss', 'public/css')
    .sass('resources/sass/acceuil.scss', 'public/css')
    .sass('resources/sass/login-main.scss', 'public/css')
    .sass('resources/sass/login-util.scss', 'public/css')
    .sass('resources/sass/styles.scss', 'public/admin/superawesome/SuperAwesome/assets/css/')
    ;
