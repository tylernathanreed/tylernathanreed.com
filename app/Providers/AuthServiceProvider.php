<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\Permission;
use App\Models\User;

use Auth;
use Flash;
use Schema;

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
		$this->registerBeforeCallbacks($gate);
		$this->registerAfterCallbacks($gate);
	}

	/////////////////
	//* Registers *//
	/////////////////
	/**
	 * Registers all Permissions for the Site.
	 *
	 * @param  GateContract  $gate  The Gate Authorizor.
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

	/**
	 * Registers all of the Callbacks that are called before each
	 * Permission is checked for Authorization.
	 *
	 * @param  GateContract  $gate  The Gate Authorizor.
	 *
	 * @return void
	 */
	public function registerBeforeCallbacks(GateContract $gate)
	{
		/**
		 * If the Site only contains a Single User, then that User
		 * is assumed to have full access to the Site. This is
		 * useful for first-time and early site planning.
		 *
		 * @param  \App\Models\User  $user       The User being checked for Authorization.
		 * @param  string            $ability    The Name of the Ability being checked for Authorization.
		 * @param  array|null        $arguments  The Arguments being passed in.
		 *
		 * @return true|void
		 */
		$gate->before(function($user, $ability, $arguments)
		{
			// Check for Single User on the Site
			if(Auth::check() && User::count() == 1)
				return true;
		});
	}

	public function registerAfterCallbacks(GateContract $gate)
	{
		$gate->after(function($user, $ability, $arguments, $result) use ($gate)
		{
			if(!$gate->has($ability))
				Flash::warning('Unregistered Ability Checked: ' . $ability);
		});
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
