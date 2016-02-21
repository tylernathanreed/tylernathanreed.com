<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\Traits\Resolveable;
use App\Support\Traits\Sluggable;
use App\Models\User;

class Permission extends Model
{
	//////////////
	//* Traits *//
	//////////////
	use Resolveable, Sluggable;

	//////////////////
	//* Attributes *//
	//////////////////
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'display', 'description'];

	/**
	 * The Non-Primary String Attribute that can Uniquely Identify this Model.
	 *
	 * @see App\Support\Traits\Resolveable
	 *
	 * @var array
	 */
	protected $uniqueKey = 'name';

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

		// Intercept the 'Created' Event
		static::creating(function($permission)
		{
			// Assign a Name to the Permission if one wasn't specified
			if(is_null($permission->name))
				$permission->name = str_replace('_', '-', snake_case($permission->display));

			// Generate the Slug
			$permission->makeSlug();
		});
	}

	/////////////////////
	//* Relationships *//
	/////////////////////
	/**
	 * Returns the Roles associated with this Permission.
	 *
	 * @return Collection
	 */
	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}
}
