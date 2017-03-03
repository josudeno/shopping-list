const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.copy('node_modules/js-utils/src/Util/Factory', 'public/js/Util/Factory');
mix.copy('node_modules/js-utils/src/Util/Provider', 'public/js/Util/Provider');
mix.copy('node_modules/js-utils/src/Util/Namespace.js', 'public/js/Util/Namespace.js');
mix.copy('node_modules/js-utils/src/Util/TypeHelper.js', 'public/js/Util/TypeHelper.js');