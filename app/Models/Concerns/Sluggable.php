<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;
use RuntimeException;

trait Sluggable
{
    /**
     * Boots the sluggable trait for a model.
     *
     * @return void
     */
    public static function bootSluggable()
    {
        // Ensure that a slug is always present
        static::saving(function ($model) {
            $model->ensureSlug();
        });
    }

    /**
     * Returns whether or not the specified slug exists.
     *
     * @param  string        $slug
     * @param  integer|null  $exceptKey
     *
     * @return boolean
     */
    public static function slugExists($slug, $exceptKey = null)
    {
        // Create a new query
        $query = (new static)->newQuery();

        // Filter against the slug
        $query->where((new static)->getSlugName(), '=', $slug);

        // If an exemption key was provided, omit it
        if (!is_null($exceptKey)) {
            $query->whereKeyNot($exceptKey);
        }

        // Return whether or not any records exist
        return $query->exists();
    }

    /**
     * Ensures that this model has a slug value.
     *
     * @return $this
     *
     * @throws \RuntimeException
     */
    public function ensureSlug()
    {
        // Make sure the model doesn't already have a slug
        if (!is_null($this->getRouteKey())) {
            return $this;
        }

        // Resolve the slug value
        $slug = $this->resolveSlug();

        // Ensure that a slug was resolved
        if (is_null($slug)) {
            throw new RuntimeException('Slug for [' . static::class . ', ' . ($this->getKey() ?: 'null') . '] could not be resolved.');
        }

        // Ensure that the slug is unique
        if (static::slugExists($slug, $this->getKey())) {
            throw new RuntimeException("Slug [{$slug}] for [" . static::class . ', ' . ($this->getKey() ?: 'null') . '] is not unique.');
        }

        // Assign the slug
        $this->setAttribute($this->getSlugName(), $slug);

        // Allow chaining
        return $this;
    }

    /**
     * Resolves the slug for this model.
     *
     * @return string
     */
    public function resolveSlug()
    {
        return Str::slug($this->getSlugBasis());
    }

    /**
     * Returns the original value for the slug.
     *
     * @return string
     */
    public function getSlugBasis()
    {
        return $this->getAttribute($this->getSlugBasisKeyName());
    }

    /**
     * Returns the slug basis key name for the model.
     *
     * @return string
     */
    public function getSlugBasisKeyName()
    {
        return 'name';
    }

    /**
     * Returns the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return $this->getSlugName();
    }

    /**
     * Returns the name of the slug attribute for this model.
     *
     * @return string
     */
    public function getSlugName()
    {
        return 'slug';
    }
}
