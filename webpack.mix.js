const mix = require("laravel-mix");
const ImageminPlugin = require("imagemin-webpack-plugin").default;
const CopyWebpackPlugin = require("copy-webpack-plugin");
const imageminMozjpeg = require("imagemin-mozjpeg");
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

mix.js("resources/js/app.js", "public/js")
    .sass("resources/css/app.scss", "public/css")
    .autoload({
        jquery: ["$", "window.jQuery", "jQuery"],
    });

mix.webpackConfig({
    plugins: [
        new CopyWebpackPlugin({
            patterns: [
                { from: "resources/images", to: "images" }, // Laravel mix will place this in 'public/images'
            ],
        }),
        new ImageminPlugin({
            test: /\.(jpe?g|png|gif|svg)$/i,
            plugins: [
                imageminMozjpeg({
                    quality: 7,
                }),
            ],
        }),
    ],
});

mix.version();
