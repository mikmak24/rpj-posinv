const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/items.js', 'public/js')
    .js('resources/js/categories.js', 'public/js')
    .js('resources/js/datatable.js', 'public/js')
    .js('resources/js/sales.js', 'public/js')
    .js('resources/js/orders.js', 'public/js')
    .js('resources/js/roles.js', 'public/js')

    .postCss('resources/css/material-dashboard.css', 'public/css', [
        //
    ])
    .scripts([
        'node_modules/jquery/dist/jquery.min.js',
     ], 'public/js/vendor.js');
