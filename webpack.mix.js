const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/res/js')
   .sass('resources/sass/app.scss', 'public/res/css');
