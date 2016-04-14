<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Support\Traits\Sluggable;

/*
|--------------------------------------------------------------------------
| Menu Model
|--------------------------------------------------------------------------
|
| The Menu Model represents a Menu that is typically used for Navigation.
| Menus serve as the Top Layer representation, where Menu Items serve
| as the Bottom Layer, and any other Layers. The Menu is the root.
|
*/
class Menu extends Model
{
	//////////////
	//* Traits *//
	//////////////
	use Sluggable;

	/**
	 * Defines the Name of the Attribute that generates the Slug.
	 *
	 * @var string
	 */
	protected $sluggable = 'title';

	//////////////////
	//* Attributes *//
	//////////////////
	/**
	 * The attributes that are not mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];

	/////////////////////
	//* Boot Override *//
	/////////////////////
	/**
	 * Override the Boot Method to schedule tasks that are Event-Triggered.
	 *
	 * @return void
	 */
	public static function boot()
	{
		// Call the Parent Method
		parent::boot();

		// Intercept the 'Creating' Event
		static::creating(function($menu)
		{
			// Initialize the Slug for the Article
			$menu->makeSlug();
		});
	}

	////////////////////
	//* Constructors *//
	////////////////////
	/**
	 * Generates a Menu with Items from the specified Attributes.
	 *
	 * @param  array  $attributes  The specified Attributes.
	 *
	 * @return void
	 */
	public static function generate($attributes)
	{
		// Create a new Menu
		$menu = new Menu;

		// Assign the Menu Attributes
		$menu->title = $attributes['title'];
		$menu->class = isset($attributes['class']) ? $attributes['class'] : null;

		// Save the Menu
		$menu->save();

		// Generate the Menu Items
		if(isset($attributes['items']))
			foreach($attributes['items'] as $index => $item)
				MenuItem::generate($menu, $item, $index);

		// Return the Menu
		return $menu;
	}

	/**
	 * Regenerates the Menu with Items from the specified Attributes.
	 *
	 * @param  array  $attributes  The specified Attributes.
	 *
	 * @return void
	 */
	public function regenerate($attributes)
	{
		// Reassign the Menu Attributes
		$this->title = $attributes['title'];
		$this->class = isset($attributes['class']) ? $attributes['class'] : null;

		// Regenerate the Menu Items
		$this->items()->delete();

		if(isset($attributes['items']))
			foreach($attributes['items'] as $item)
				MenuItem::generate($this, $item);

		// Return the Menu
		return $this;
	}

	///////////////////////////
	//* Attribute Overrides *//
	///////////////////////////
	/**
	 * Overrides $this->allItems to call $this->allItems().
	 *
	 * @return Collection
	 */
	public function getAllAttribute()
	{
		return $this->__all();
	}

	/**
	 * Overrides $this->items to automatically sort by their Order.
	 *
	 * @return Collection
	 */
	public function getItemsAttribute()
	{
		return $this->items()->orderBy('order')->with('permissions')->get();
	}

	/////////////////
	//* Accessors *//
	/////////////////
	/**
	 * Returns all of the Items that belong to this Menu, or any
	 * descendant Menu Item that also has nested Menu Items.
	 *
	 * @return Collection
	 */
	public function __all()
	{
		return $this->withAllItems()->where('id', $this->id)->get();
	}

	/////////////////////
	//* Relationships *//
	/////////////////////
	/**
	 * Return the Items that belong to this Menu.
	 *
	 * @return Relationship
	 */
	public function items()
	{
		return $this->morphMany(MenuItem::class, 'parent');
	}

	////////////////////
	//* Query Scopes *//
	////////////////////
	/**
	 * Expands the Item Relationship to the fullest extent.
	 *
	 * @param  Builder  $query  The current Query.
	 *
	 * @return void
	 */
	public function scopeWithAllItems($query)
	{
		// Initialize the With Clause
		$with = 'items';

		// Nest the With Clause
		do
		{
			// Iterate the Result
			$result = $query->with($with);

			// Deepen the With Clause
			$with .= '.items';
		}
		while($result != $query->with($with));

		return $result;
	}
}
