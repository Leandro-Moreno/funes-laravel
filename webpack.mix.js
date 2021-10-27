var path = require('path');
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
mix.babelConfig({
    plugins: ['@babel/plugin-syntax-dynamic-import'],
});
mix.js('resources/js/app.js', 'public/js')
    .vue({
        extractStyles:false,
    })
    .extract()
    .sass('resources/sass/material-dashboard.scss', 'public/material/css')
    .browserSync('funes-laravel.test')
    .version()
    .sourceMaps()
    .webpackConfig({
    output: {
        publicPath: '/',
        chunkFilename: 'js/[name].[chunkhash].js',
    }
    });
