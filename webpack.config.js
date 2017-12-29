var Encore = require('@symfony/webpack-encore');
const CopyWebpackPlugin = require('copy-webpack-plugin');

Encore
    // directory where all compiled assets will be stored
    .setOutputPath('public/assets/')

    // what's the public path to this directory (relative to your project's document root dir)
    .setPublicPath('/assets')

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // will output as web/build/app.js
    .addEntry('app', './assets/js/main.js')

    // will output as web/build/main.css
    .addStyleEntry('main', './assets/scss/main.scss')

    // allow sass/scss files to be processed
    .enableSassLoader()

    .enablePostCssLoader()

    // allow legacy applications to use $/jQuery as a global variable
    .autoProvidejQuery()

    .autoProvideVariables({
        "window.jQuery": "jquery",
    })

    .enableSourceMaps(!Encore.isProduction())

    .addLoader({
        test: /\.(png|jpg|jpeg|gif|ico)$/,
        loader: 'image-webpack-loader',
        options: {
            mozjpeg: {
                progressive: true,
                quality: 65
            },
            pngquant:{
                quality: "65-80",
            },
        }
    })

    .addPlugin(new CopyWebpackPlugin([
        { from: './assets/images/', to: 'images/' },
        { from: './assets/files/', to: 'files/' }
    ]))
;

// export the final configuration
module.exports = Encore.getWebpackConfig();
