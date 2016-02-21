<?php

namespace App\Support\Traits;

/*
|--------------------------------------------------------------------------
| Resolvable Trait
|--------------------------------------------------------------------------
|
| The Resolveable Trait is intended to be applied to an Eloquent Model.
| If a Model is 'Resolveable', then it is implied that the Model can
| be found by an Integer Primary Key, and possibly a String Unique
| Key. Either way, using the Model::resolve($key) Query Scope
| will become available when utilizing this Trait.
|
*/
trait Resolveable
{
	/**
	 * Resolves the specified Key to a Single Resource.
	 *
	 * @param  Builder  $query  The Original Query.
	 * @param  mixed 	$key 	A Unique Identifer for this Model.
	 *
	 * @return mixed
	 */
	public function scopeResolve($query, $key)
	{
		// Determine the Unique Key, if any
		$uniqueKey = property_exists($this, 'uniqueKey') ? $this->uniqueKey : null;

		if(is_int($key))
			return $query->where($this->primaryKey, $key)->firstOrFail();
		else if(is_string($key))
			return $query->where($uniqueKey, $key)->firstOrFail();

		return $key;
	}
}