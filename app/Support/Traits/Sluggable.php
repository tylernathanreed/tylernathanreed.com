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
		// Intialize the Slug
		$initial = str_slug($this->sluggable);

		// Check for Unchanged Slug
		if($this->slug == $initial)
			return $this->slug;

		// Determine the Highlist Slug Value
		$slug = $this->getHighestSlug($initial, $collection);

		// Assign the Slug
		$this->slug = is_null($slug) ? $initial : $initial . '-' . ($slug + 1);

		return $this->slug;
	}

	///////////////////////////
	//* Attribute Overrides *//
	///////////////////////////
	/**
	 * Returns the Slug Attribute that defines the actual Slug used to
	 * uniquely identify this Object.
	 *
	 * @return string
	 */
	public function getSlugAttribute($value)
	{
		return isset($this->attributes[$this->getSlugAttributeName()]) ? $this->attributes[$this->getSlugAttributeName()] : null;
	}

	/**
	 * Sets the Slug Attribute.
	 *
	 * @return void
	 */
	public function setSlugAttribute($value)
	{
		$this->attributes[$this->getSlugAttributeName()] = $value;
	}

	/**
	 * Returns the Sluggable Attribute that is used to generate the Slug
	 * for this Object.
	 *
	 * @return string
	 */
	public function getSluggableAttribute($value)
	{
		return $this->attributes[$this->getSluggableAttributeName()];
	}

	/////////////////
	//* Accessors *//
	/////////////////
	/**
	 * Returns the Name of the Slug Attribute.
	 *
	 * @return string
	 */
	public function getSlugAttributeName()
	{
		// Check for Trait Override
		if(property_exists($this, 'slugAttribute'))
			return $this->slugAttribute;

		// Return the Default Attribute
		return 'slug';
	}

	/**
	 * Returns the Name of the Sluggable Attribute.
	 *
	 * @return string
	 */
	public function getSluggableAttributeName()
	{
		// Check for Trait Override
		if(property_exists($this, 'sluggableAttribute'))
			return $this->sluggableAttribute;

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
		$query->where($this->getSlugAttributeName(), $slug);
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
		$query->whereRaw($this->getSlugAttributeName() . " RLIKE '^{$slug}(-[0-9]+)?$'");
	}
}
