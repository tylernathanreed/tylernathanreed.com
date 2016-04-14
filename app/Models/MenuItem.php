<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Support\Traits\Permissions;

use Route;

/*
|--------------------------------------------------------------------------
| Menu Item Model
|--------------------------------------------------------------------------
|
| The Menu Item Model represents Intermediate and Bottom Layers of a Menu.
| Menu Items may either be the child of a Menu, or another Menu Item.
| The Parent Relationship needs to be iterated to reach the Menu.
|
*/
class MenuItem extends Model
{
	//////////////
	//* Traits *//
	//////////////
	use Permissions;

	//////////////////
	//* Attributes *//
	//////////////////
	/**
	 * The attributes that are not mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id', 'parent_type', 'parent_id'];

	/**
	 * Whether or not the 'created_at' and 'updated_at' attributes are used.
	 *
	 * @var array
	 */
	public $timestamps = false;

	////////////////////
	//* Constructors *//
	////////////////////
	/**
	 * Generates a Menu Item from the specified Attributes.
	 *
	 * @param  Menu|MenuItem  $parent      The parent of the Menu Item.
	 * @param  array          $attributes  The specified Attributes.
	 * @param  int            $index       The index within the Parent.
	 *
	 * @return void
	 */
	public static function generate($parent, $attributes, $index = null)
	{
		// Create a new Menu Item
		$item = new MenuItem;

		// Assign the Item Attributes
		$item->name = $attributes['name'];
		$item->route = $attributes['route'];
		$item->order = isset($attributes['order']) ? $attributes['order'] : (!is_null($index) ? $index : 0);

		// Save the Menu Item
		$parent->items()->save($item);

		// Assign the Item Permissions
		if(isset($attributes['permissions']))
			foreach($attributes['permissions'] as $permission)
				$item->addPermission($permission);

		// Generate the Nested Menu Items
		if(isset($attributes['items']))
			foreach($attributes['items'] as $nested)
				MenuItem::generate($item, $nested);

		// Return the Menu Item
		return $item;
	}

	///////////////////////////
	//* Attribute Overrides *//
	///////////////////////////
	/**
	 * Overrides the $this->active Accessor to call $this->isActive().
	 *
	 * @return boolean
	 */
	public function getActiveAttribute()
	{
		return $this->isActive();
	}

	/////////////////
	//* Accessors *//
	/////////////////
	/**
	 * Returns whether or not the Current Route is the Route
	 * specified by this Item.
	 *
	 * @return boolean
	 */
	public function isActive()
	{
		return $this->route == Route::currentRouteName();
	}

	/**
	 * Alias for {@see $this->isActive()}.
	 */
	public function active()
	{
		return $this->isActive();
	}

	/////////////////////
	//* Relationships *//
	/////////////////////
	/**
	 * Return the Parent of this Menu Item.
	 *
	 * @return Menu|MenuItem
	 */
	public function parent()
	{
		$this->morphTo('parent');
	}

	/**
	 * Return the Items that belong to this Item.
	 *
	 * @return Relationship
	 */
	public function items()
	{
		return $this->morphMany(MenuItem::class, 'parent');
	}

	/**
	 * Returns the Permissions associated with this Item.
	 *
	 * @return Relationship
	 */
	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'menu_item_permission', 'item_id', 'permission_id');
	}
}
