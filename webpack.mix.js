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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
    .copyDirectory('resources/assets/images/', 'public/images')
    .copyDirectory('resources/fonts/fontawesome-free-5.2.0-web/webfonts/', 'public/fonts')
    .options({ extractVueStyles: true });

if (process.env.npm_lifecycle_event !== 'hot')
{
    mix.version();
    mix.sourceMaps(false);
}

if (process.env.npm_lifecycle_event === 'dev')
{
    mix.disableNotifications();
    mix.sourceMaps(false);
}