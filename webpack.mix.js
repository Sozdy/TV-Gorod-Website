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
const isProd = mix.inProduction()
const isDev = !mix.inProduction()

mix.browserSync('localhost:8000');

mix.copyDirectory('resources/img', 'public/img');
mix.copyDirectory('resources/fonts', 'public/fonts');
mix.copyDirectory('resources/gif_add', 'public/gif_add');

mix.stylus('resources/stylus/app.styl', 'public/css').options({processCssUrls: false}).sourceMaps(false, 'source-map')

if (isProd) {
    mix.version()
}

mix.js('resources/js/app.js', 'public/js').sourceMaps(false, 'source-map')
    .extract(["vue", "jquery", "axios"])

if (isProd) {
    mix.version()
}
