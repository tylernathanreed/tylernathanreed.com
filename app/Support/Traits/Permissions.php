<?php

namespace App\Support\Traits;

use App\Models\Permission;

/*
|--------------------------------------------------------------------------
| Permissions Trait
|--------------------------------------------------------------------------
|
| The Permissions Trait is intended to be applied to an Eloquent Model.
| If the Model uses Permissions, then this Trait can be used to add
| helper functions will that ease the complexity of maintainence.
|
*/
trait Permissions
{
	/**
	 * Associates the specified Permission with this Model.
	 *
	 * @param  mixed  $permission  The specified Permission.
	 *
	 * @return mixed
	 */
	public function addPermission($permission)
	{
		// Resolve the Permission
		$permission = Permission::resolve($permission);

		// Associate the Permission with this Model
		return $this->permissions()->attach($permission->id);
	}

	/**
	 * Dissociates the specified Permission from this Model.
	 *
	 * @param  mixed  $permission  The specified Permission.
	 *
	 * @return mixed
	 */
	public function removePermission($permission)
	{
		// Resolve the Permission
		$permission = Permission::resolve($permission);

		// Dissociate the Permission with this Model
		return $this->permissions()->detach($permission->id);
	}
}

