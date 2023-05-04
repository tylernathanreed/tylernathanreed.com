const path = require('path')
const mix = require('laravel-mix')

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
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .extract([
        'lodash',
        'popper.js',
        'portal-vue',
        'vue',
    ])
    .vue()
    .sourceMaps()
    .options({
        terser: {
            extractComments: false
        }
    })
    .webpackConfig({
        output: {
            chunkFilename: (pathData) => {
                return (
                    'js/compiled/' +
                    (pathData.chunk.id + '')
                        .replace(/resources_js_/g, '')
                        .replace(/_/g, '/')
                        .replace(/\/vue/, '') +
                    '.js?id=' +
                    pathData.chunk.hash
                );
            }
        },
        resolve: {
            alias: {
                vue$: 'vue/dist/vue.runtime.esm.js',
                '@': path.resolve('resources/js'),
            },
        },
    })
