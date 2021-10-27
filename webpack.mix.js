var path = require('path');
const mix = require('laravel-mix');
require('laravel-mix-clean');


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
mix.babelConfig({
    plugins: ['@babel/plugin-syntax-dynamic-import'],
});
mix.js('resources/js/app.js', 'public/js')
    .vue()
    .extract()
    .sass('resources/sass/material-dashboard.scss', 'public/material/css')
    .browserSync('funes-laravel.test')
    .version()
    .sourceMaps()
    .clean({
        cleanOnceBeforeBuildPatterns: ['./js/*'],
    })
    .webpackConfig({
        output: {
            publicPath: '/',
            chunkFilename: 'js/[name].js',
        }
    });
