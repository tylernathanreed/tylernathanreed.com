<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\Traits\Resolveable;
use App\Support\Traits\Sluggable;

class Role extends Model
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
		static::creating(function($role)
		{
			// Assign a Name to the Role if one wasn't specified
			if(is_null($role->name))
				$role->name = str_replace('_', '-', snake_case($role->display));

			// Generate the Slug
			$role->makeSlug();
		});
	}

	////////////////////////////
	//* Attributes Overrides *//
	////////////////////////////
	/**
	 * Overrides the $role->name Attibute to update the Sluggable Name.
	 *
	 * @return void
	 */
	public function setNameAttribute($name)
	{
		$this->attributes['name'] = $name;

		$this->makeSlug();
	}

	/////////////////////
	//* Relationships *//
	/////////////////////
	/**
	 * Returns the Permissions associated with this Role.
	 *
	 * @return Collection
	 */
	public function permissions()
	{
		return $this->belongsToMany(Permission::class);
	}

	/**
	 * Associates the specified Permission with this Role.
	 *
	 * @param  mixed  $permission  The specified Permission.
	 *
	 * @return mixed
	 */
	public function addPermission($permission)
	{
		return $this->permissions()->attach($permission->id);
	}

	/**
	 * Dissociates the specified Permission from this Role.
	 *
	 * @param  mixed  $permission  The specified Permission.
	 *
	 * @return mixed
	 */
	public function removePermission($permission)
	{
		return $this->permissions()->detach($permission->id);
	}

	/**
	 * Returns the Users associated with this Role.
	 *
	 * @return Collection
	 */
	public function users()
	{
		return $this->belongsToMany(User::class);
	}

	/**
	 * Associates the specfied User with this Role.
	 *
	 * @param  User  $user  The specified User.
	 *
	 * @return mixed
	 */
	public function assign(User $user)
	{
		return $this->users()->attach($user->id);
	}

	/**
	 * Dissociates the specfied User from this Role.
	 *
	 * @param  User  $user  The specified User.
	 *
	 * @return mixed
	 */
	public function unassign(User $user)
	{
		return $this->users()->detach($user->id);
	}

	/////////////////
	//* Accessors *//
	/////////////////
	/**
	 * Returns whether or not the specified Permission is associated with this Role.
	 *
	 * @param  mixed  $permission  The specified Permission.
	 *
	 * @return boolean
	 */
	public function can($permission)
	{
		// Resolve the Permission
		$permission = Permission::resolve($permission);

		return $this->permissions->contains($permission);
	}

	////////////////////
	//* Query Scopes *//
	////////////////////
	/**
	 * Filters Roles by whether or not they are associated with the specified User.
	 *
	 * @param  Builder  $query  The current Query.
	 * @param  User     $user   The specified User.
	 *
	 * @return void
	 */
	public function scopeWithUser($query, $user)
	{
		$query->join('role_user', 'role_user.role_id', '=', 'roles.id')
			  ->where('role_user.user_id', $user->id);
	}

	/**
	 * Filters Roles by whether or not they are associated with the specified User.
	 *
	 * @param  Builder  $query  The current Query.
	 * @param  User     $user   The specified User.
	 *
	 * @return void
	 */
	public function scopeWithoutUser($query, $user)
	{
		// Determine all of the Users with the Role
		$models = static::withUser($user)->get()->pluck('id')->toArray();

		// Return the Users that do not have the Role
		$query->whereNotIn('id', $models);
	}

	/**
	 * Filters Roles by whether or not they are associated with the specified Permission.
	 *
	 * @param  Builder     $query       The current Query.
	 * @param  Permission  $permission  The specified Permission.
	 *
	 * @return void
	 */
	public function scopeWithPermission($query, $permission)
	{
		// Resolve the Permission
		$permission = Permission::resolve($permission);

		$query->join('permission_role', 'permission_role.role_id', '=', 'roles.id')
			  ->where('permission_role.permission_id', $permission->id);
	}

	/**
	 * Filters Roles by whether or not they are associated with the specified Permission.
	 *
	 * @param  Builder     $query       The current Query.
	 * @param  Permission  $permission  The specified Permission.
	 *
	 * @return void
	 */
	public function scopeWithoutPermission($query, $permission)
	{
		// Determine all of the Roles with the Permission
		$roles = static::withPermission($permission)->get()->pluck('id')->toArray();

		// Return the Roles that do not have the permission
		$query->whereNotIn('id', $roles);
	}
}
