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

mix.options({ processCssUrls: false });
mix.disableNotifications();

mix.js('resources/js/app.js', 'public/js/app.js')
   .styles('resources/css/app.css', 'public/css/app.css');

// version files in production
if (mix.inProduction()) {
    mix.version();
}
  else {
     mix.browserSync({
         proxy: 'ini.app',
         files: [
                './resources/views/**/*.blade.php',
            ]
     });
  }
