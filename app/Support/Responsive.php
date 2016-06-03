<?php

namespace App\Support;

/*
|--------------------------------------------------------------------------
| Responsive Abstract Class
|--------------------------------------------------------------------------
|
| The Responsive Abstract Class adds the Magic __get accessor to all of
| its children. This accessor will catch any missing properties, and
| call them as Methods. The result of the Method will be returned.
|
*/
abstract class Responsive
{
	/**
	 * Calls missing Properties as Methods if such a Method Exists.
	 *
	 * @param  string  $property  The specified Property.
	 *
	 * @return mixed
	 *
	 * @throws Exception
	 */
	public function __get($property)
	{
		// Make sure the Property Exists
		if(property_exists($this, $property))
			call_user_func([$this, $property]); // Call the Property as a Method

		// Determine the Error Message
		$message = '%s does not have the "%s" attribute or method.';

		// Throw an Exception
		throw new \Exception(sprintf($message, static::class, $property));
	}
}