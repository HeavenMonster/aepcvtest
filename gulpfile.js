// disable notification bubbles
// as sometimes they delay task exit
process.env.DISABLE_NOTIFIER = true;

const elixir = require('laravel-elixir');

// force minify to be always ON
elixir.config.production = true;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix
        // Copy bootstrap fonts
        .copy('node_modules/bootstrap-sass/assets/fonts',
            'public/fonts')

        // Custom styles
        .sass('app.scss')

        // 3rd party styles (ORDER IS IMPORTANT!!!)
        .styles([
            "angular-loading-bar/build/loading-bar.min.css"
        ],
        "public/css/vendor.css",
        "resources/assets/vendor")

        // 3rd party scripts (ORDER IS IMPORTANT!!!)
        .scripts([
            "jquery/dist/jquery.min.js",
            "angular/angular.min.js",
            "angular-resource/angular-resource.min.js",
            "angular-loading-bar/build/loading-bar.min.js"
        ],
        "public/js/vendor.js",
        "resources/assets/vendor")

        // Angular app
        .scripts([
            "boot.js",
            "controllers/**/*.js",
            "services/**/*.js"
        ],
        "public/js/app.js");
});
