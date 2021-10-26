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
    .sass('resources/sass/material-dashboard.scss', 'public/material/css')
    .browserSync('funes-laravel.test')
    .version()
    .sourceMaps()
    .options({
        hmrOptions: {
            host: 'localhost',
            port: '9000'
        },
    })
    .webpackConfig({
        module: {
            rules: [
                {
                    test: /\.jsx?$/,
                    exclude: /node_modules(?!\/foundation-sites)|bower_components/,
                    use: [
                        {
                            loader: 'babel-loader',
                            options: Config.babel()
                        }
                    ]
                }
            ]
        },
        resolve: {
            alias: {
                '@': path.resolve('resources/assets/sass')
            }
        }
    })
    .webpackConfig({
        devServer: {
            port: '9000',
            compress: 'true',
            http2: 'true'
        },
    });
mix.options({
    extractVueStyles: true,
    processCssUrls: false
});
mix.webpackConfig({
    output: {
        publicPath: '/',
        chunkFilename: 'js/[name].[chunkhash].js',
    }
});
