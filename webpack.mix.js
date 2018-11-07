const path = require('path');
const mix = require('laravel-mix');
const WatchExternalFilesPlugin = require('webpack-watch-files-plugin').default;

Mix.paths.setRootPath(process.cwd());

mix
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .browserSync({
        proxy: 'http://localhost.test',
        host: 'localhost.test',
        open: false,
    })
    .extract([
        'axios',
        'jquery',
        'vue',
        'vuex',
    ])
    .options({
        extractVueStyles: true,
        globalVueStyles: 'resources/assets/sass/path/to/variables',
    })
    .webpackConfig({
        devtool: mix.inProduction() ? 'source-map' : 'eval-source-map',
        plugins: [
            new WatchExternalFilesPlugin({
                files: ['resources/lang/**/*.php'],
            }),
        ],
        resolve: {
            alias: {
                '@': path.resolve(__dirname, 'resources/assets/js'),
            },
            extensions: ['.js', '.vue'],
        },
    });

if (mix.inProduction()) {
    mix.version();
}
