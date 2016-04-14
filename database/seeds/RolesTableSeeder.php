<?php

use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\Permission;

/*
|--------------------------------------------------------------------------
| Roles Table Seeder
|--------------------------------------------------------------------------
|
| The Roles Table Seeder seeds the Roles Table, effectively creating all of
| the default Roles for this application. This Seeder is also responsible
| for assigning Permissions to Roles, and also Users to Roles. While
| this can be managed on the site later on, this seeder defines
| the default behavior.
|
*/
class RolesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		/*
		|--------------------------------------------------------------------------
		| Administrator Role
		|--------------------------------------------------------------------------
		|
		| An Administrator has no specified Permissions. It is implied that an
		| Administrator has all Permissions, and is given access to every
		| feature, route, capability, etc. on the site.
		|
		*/

		// Create the Role
		$role = Role::updateOrCreate(['name' => 'administrator'], [
			'display' 		=> 'Administrator',
			'description'  	=> 'Users with this Role have access to everything.'
		]);

		// Assign the Permissions
		$role->permissions()->sync(
			Permission::whereIn('name', array(
				'manage-permissions',
				'manage-roles',
				'manage-articles'
			))->get()->pluck('id')->toArray()
		);
	}
}
