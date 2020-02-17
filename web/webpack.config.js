let Encore = require('@symfony/webpack-encore');

Encore
    .disableSingleRuntimeChunk()
    .setOutputPath('public/ui/')
    .setPublicPath('/ui')
    .addEntry('app', './assets/js/app.js')
    .addStyleEntry('ui', './assets/scss/app.scss')
    .enableSassLoader(function(options) {}, {
        resolveUrlLoader: false
    })
;

module.exports = Encore.getWebpackConfig();
