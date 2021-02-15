require('dotenv').config();

const mix = require('laravel-mix');
require('mix-env-file');

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

mix.js(
        'resources/js/app.js', 
        'public/js'
    )
    .combine([
        'resources/js/services/api-handler.js',
        'resources/js/services/auth-services.js',
        'resources/js/services/booking-services.js'
    ], 
        'public/js/services.js')
    .sass(
        'resources/sass/app.scss', 
        'public/css'
    );

mix.disableNotifications();

mix.env(process.env.ENV_FILE);

console.log(JSON.stringify(process.env.ENV_FILE));