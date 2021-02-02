<?php

namespace App\Models\Concerns;

use Laravel\Nova\Nova;

trait HasResource
{
	/**
	 * Returns the resource for this model.
	 *
	 * @return \Laravel\Nova\Resources\Resource
	 */
	public function getResource()
	{
		return Nova::newResourceFromModel($this);
	}

	/**
	 * The attribute alias of {@see $this->getResource()}.
	 *
	 * @return \Laravel\Nova\Resources\Resource
	 */
	public function getResourceAttribute()
	{
		return $this->getResource();
	}
}