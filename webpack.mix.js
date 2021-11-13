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
    .extract(['debounce','vue-pdf-app','pixi.js','vue-form-wizard','vue-loader'])
    .extract()
    .sass('resources/sass/material-dashboard.scss', 'public/material/css')
    .browserSync('funes-laravel.test')
    .clean({
        cleanOnceBeforeBuildPatterns: ['./js/*'],
    })
    .options({
        postCss: [require('autoprefixer')],
        clearConsole: true,
    })
    .webpackConfig({
        output: {
            publicPath: '/',
            chunkFilename: 'js/[name].js',
        }
    });

if (mix.inProduction()) {
    mix.version();
} else {
    mix.version();
    mix.sourceMaps();
}
