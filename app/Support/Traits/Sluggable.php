<?php

namespace App\Support\Traits;

trait Sluggable
{
	/**
	 * Generates a Slug based on the Sluggable Attribute.
	 *
	 * @param  Collection  $collection  The Collection of Resources where the Slug must be Unique.
	 *
	 * @return string
	 */
	public function makeSlug($collection = [])
	{
		debug('Generating Slug');
		debug($this);

		// Intialize the Slug
		$initial = $this->getInitialSlug();

		debug(' -> Initial Slug: ' . $initial);
		debug(' -> Current Slug: ' . $this->slug);

		// Check for Unchanged Slug
		if($this->slug == $initial)
			return $this->slug;

		// Determine the Highlist Slug Value
		$slug = $this->getHighestSlug($initial, $collection);

		debug(' -> Highest Slug: ' . $slug);

		// Assign the Slug
		$this->slug = is_null($slug) ? $initial : $initial . '-' . ($slug + 1);

		debug('New Slug: ' . $this->slug);

		return $this->slug;
	}

	/////////////////
	//* Accessors *//
	/////////////////
	/**
	 * Returns the Initial Slug.
	 *
	 * @return string
	 */
	public function getInitialSlug()
	{
		return str_slug($this->attributes[$this->getSluggable()]);
	}

	/**
	 * Returns the Name of the Sluggable Attribute.
	 *
	 * @return string
	 */
	public function getSluggable()
	{
		// Check for Trait Override
		if(property_exists($this, 'sluggable'))
			return $this->sluggable;

		// Return the Default Attribute
		return 'name';
	}

	/**
	 * Returns the Slug Identifier annexed to the Slug Attribute.
	 *
	 * @return integer
	 */
	public function getSlugIdentifier()
	{
		// Split the Slug by the Space / Hypen Delimiter
		$explode = explode('-', $this->slug);

		// Return the Last Entry of the Split
		return intval(end($explode));
	}

	/**
	 * Returns the Highest Slug Identifier that matches the specified Slug, where all
	 * applicable values are within the specified Collection.
	 *
	 * @param  string   $match       The Slug value to match.
	 * @param  array    $collection  The Array of IDs to contrain the search.
	 *
	 * @return integer
	 */
	public function getHighestSlug($match, $collection = null)
	{
		// Check for a Collection
		if(!is_null($collection) && !empty($collection))
			$query = $this->whereIn($this->primaryKey, $collection);
		else
			$query = $this;

		// Find all Instances using similar Slugs
		$instances = $query->withSimilarSlug($match)->get();

		// Find the first gap in the Slugs
		$slug = null;

		foreach($instances as $instance)
		{
			// Determine the Slug Identifier
			$slugID = $instance->getSlugIdentifier();

			// Use the Highest Value
			if($slug < $slugID || is_null($slug))
				$slug = $slugID;
		}

		return $slug;
	}

	////////////////////
	//* Query Scopes *//
	////////////////////
	/**
	 * Filters Instances by their Slug.
	 *
	 * @param  Builder  $query  The current Query.
	 * @param  string   $slug   The Slug value to match.
	 *
	 * @return void
	 */
	public function scopeWithSlug($query, $slug)
	{
		$query->where('slug', $slug);
	}

	/**
	 * Filters Instances by whether or not their Slug is similiar to the specified Slug.
	 *
	 * @param  Builder  $query  The current Query.
	 * @param  string   $slug   The Slug value to match.
	 *
	 * @return void
	 */
	public function scopeWithSimilarSlug($query, $slug)
	{
		$query->whereRaw('slug' . " RLIKE '^{$slug}(-[0-9]+)?$'");
	}
}
