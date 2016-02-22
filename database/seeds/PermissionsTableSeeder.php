<?php

use Illuminate\Database\Seeder;

use App\Models\Permission;

/*
|--------------------------------------------------------------------------
| Permissions Table Seeder
|--------------------------------------------------------------------------
|
| The Permissions Table Seeder seeds the Permissions Table, effectively
| creating all of the Permissions for this application.
|
| Note that if the code does not enforce a Permission, then it effectively
| does not apply, and should either be removed, or the code should be
| updated to enforce the Permission.
|
*/
class PermissionsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Permission::updateOrCreate(['name' => 'manage-permissions'], [
			'display' 		=> 'Manage Permissions',
			'description' 	=> 'Allows the User Manage Permissions.'
		]);

		Permission::updateOrCreate(['name' => 'manage-roles'], [
			'display' 		=> 'Manage Roles',
			'description' 	=> 'Allows the User Manage Roles.'
		]);

		Permission::updateOrCreate(['name' => 'manage-articles'], [
			'display' 		=> 'Manage Articles',
			'description' 	=> 'Allows the User Manage Articles.'
		]);
	}
}
