<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * The Bindings between Models and their respective Route Wildcards.
	 *
	 * @var array
	 */
	protected $bindings = array(
		\App\Models\Article::class 		=> ['articles' 		=> 'slug'],
		\App\Models\Menu::class 		=> ['menus' 		=> 'slug'],
		\App\Models\Role::class 		=> ['roles' 		=> 'slug'],
		\App\Models\Permission::class 	=> ['permissions' 	=> 'slug']
	);

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param Router $router
	 *
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		// Bind Sluggables
		$this->performBindings($router);
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param Router $router
	 *
	 * @return void
	 */
	public function map(Router $router, Request $request)
	{
		$router->group(['namespace' => $this->namespace], function ($router)
		{
			require app_path('Http/routes.php');
		});
	}

	/**
	 * Binds the each Route Wildcard to their specified Model's Attribute.
	 *
	 * @param  Router  $router	The Application Router.
	 *
	 * @return void
	 */
	private function performBindings(Router $router)
	{
        // Iterate through each Model's Bindings
		foreach($this->bindings as $model => $binding)
            // Iterate through each Binding for the Model
			foreach($binding as $wildcard => $attribute)
                // Perform each Binding
				$this->bind($router, $model, $wildcard, $attribute);
	}

	/**
	 * Binds the specified Model to the Wildcard / Attribute Pair.
	 *
	 * @param  Router  $router	 The Application Router.
	 * @param  string  $model	  The Class Path of the Model.
	 * @param  string  $wildcard   The Name of the Route Wildcard.
	 * @param  string  $attribute  The Name of the Model Attribute that maps to the Wildcard.
	 *
	 * @return Model
	 */
	private function bind(Router $router, $model, $wildcard, $attribute)
	{
		$router->bind($wildcard, function($value) use ($model, $attribute)
		{
			return $model::where($attribute, $value)->firstOrFail();
		});
	}
	/**
	 * Returns the Model using the specified Wildcard in a Binding.
	 *
	 * @param  string  $wildcard  The Name of the Route Wildcard.
	 *
	 * @return string  The Classpath of the Model.
	 */
	private function lookup($wildcard)
	{
		$binding = array_filter($this->bindings, function($binding) use ($wildcard)
		{
			return in_array($wildcard, array_keys($binding));
		});

		return $binding;
	}
}
