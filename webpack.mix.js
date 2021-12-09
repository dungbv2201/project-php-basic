let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');
mix.sass('resources/styles/admin/app.scss','public/styles/admin');
mix.sass(	'resources/styles/admin/login.scss', 'public/styles/admin');
