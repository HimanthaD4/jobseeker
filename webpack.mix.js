// webpack.mix.js

const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .styles([
       'public/css/custom.css',
       // Add other CSS files if needed
   ], 'public/css/all.css');
