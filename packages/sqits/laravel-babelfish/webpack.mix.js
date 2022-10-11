const mix = require('laravel-mix');
const webpack = require('webpack');
const tailwindcss = require('tailwindcss');

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

mix
    .setPublicPath('public')
    .js('resources/js/app.js', 'public')
    .sass('resources/sass/app.scss', 'public')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    })
    .vue();

// mix.options({
//     terser: {
//         terserOptions: {
//             compress: {
//                 drop_console: true,
//             },
//         },
//     },
// })
//     .setPublicPath('public')
//     .js('resources/js/app.js', 'public')
//     .vue()
//     .sass('resources/sass/app.scss', 'public')
//     .sass('resources/sass/app-dark.scss', 'public')
//     .version()
//     .copy('resources/img', 'public/img')
//     .webpackConfig({
//         resolve: {
//             symlinks: false,
//             alias: {
//                 '@': path.resolve(__dirname, 'resources/js/'),
//             },
//         },
//         plugins: [
//             new webpack.IgnorePlugin({
//                 resourceRegExp: /^\.\/locale$/,
//                 contextRegExp: /moment$/,
//             }),
//         ],
//     });
