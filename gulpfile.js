var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	mix.sass('app.scss', './public/media/css/all.min.css');
	mix.sass('projects.scss', './public/media/css/projects.min.css');


	mix.scripts(['vendor/chosen-select.js'], 'public/media/js/chosen-select.js');
	mix.scripts(['jquery-extensions.js'], 'public/media/js/forms.js');
	mix.babel(['projects/game-of-life.js'], 'public/media/js/projects/game-of-life.min.js');
});
