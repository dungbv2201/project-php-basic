let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');

// Admin
mix.sass('resources/styles/admin/app.scss','public/styles/admin');
mix.sass(	'resources/styles/admin/login.scss', 'public/styles/admin');

// Client
mix.sass(	'resources/styles/client/app.scss', 'public/styles/client');
