<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Schema;

use App\Models\Permission;

class AuthServiceProvider extends ServiceProvider
{
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		'App\Model' => 'App\Policies\ModelPolicy',
	];

	/**
	 * Register any application authentication / authorization services.
	 *
	 * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
	 * @return void
	 */
	public function boot(GateContract $gate)
	{
		parent::registerPolicies($gate);

		$this->registerPermissions($gate);
	}

	/////////////////
	//* Registers *//
	/////////////////
	/**
	 * Registers all Permissions for the Site.
	 *
	 * @return void
	 */
	public function registerPermissions(GateContract $gate)
	{
		// Register each Permission
		foreach($this->getPermissions() as $permission)
		{
			$gate->define($permission->name, function($user) use ($permission)
			{
				// If the User has any Role containing the Permision...
				return $user->is($permission->roles);
			});
		}
	}

	/////////////////
	//* Accessors *//
	/////////////////
	/**
	 * Returns all Site Permissions with their Roles.
	 *
	 * @return Collection
	 */
	public function getPermissions()
	{
		return Schema::hasTable('permissions') ? Permission::with('roles')->get() : [];
	}
}
