let mix = require('laravel-mix');

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

mix.styles(['resources/assets/css/bootstrap.min.css',
    'resources/assets/css/bootstrap-rtl.min.css',
    'resources/assets/css/font-awesome.css',
    'resources/assets/css/sb-admin.css',
    'resources/assets/css/sb-admin-rtl.css',], 'public/css/app.css'
)

mix.scripts(['resources/assets/js/vendor/jquery.js',
    'resources/assets/js/vendor/bootstrap.js',

], 'public/js/app.js');

mix.js('resources/assets/js/app.js','public/js/vue.js');

