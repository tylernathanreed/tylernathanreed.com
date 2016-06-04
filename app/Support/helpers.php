<?php

if(!function_exists('method'))
{
	/**
	 * Returns the Method associated with the given Route.
	 *
	 * @paramstring$nameThe Name of the Route
	 *
	 * @return string
	 */
	function method($name)
	{
		// Determine the Route by Name
		$route = Route::getRoutes()->getByName($name);

		// Determine the Methods of the Route
		$methods = $route->getMethods();

		// Return the First Entry
		return count($methods) ? $methods[0] : null;
	}
}


if(!function_exists('has_error'))
{
	/**
	 * Returns an HTML Class when the specified Field has an Error.
	 *
	 * @param  string  $field  The Name of the Field
	 *
	 * @return string
	 */
	function has_error($field)
	{
		// Determine the Session
		$session = app('session');

		if($session->has('errors') && $session->get('errors')->has($field))
			return ' has-error';

		return '';
	}
}

if(!function_exists('val'))
{
	/**
	 * Returns the Form Value for the specified Field, giving precedence to
	 * Old Form values over Model Values.
	 *
	 * @paramstring$fieldThe Name of the Field
	 * @paramModel $modelThe Model for the Form
	 *
	 * @return string
	 */
	function val($field, $model = null)
	{
		// Check for a Model Value
		$value = !is_null($model) && !is_null($model->$field) ? $model->$field : null;

		return old($field, $value);
	}
}