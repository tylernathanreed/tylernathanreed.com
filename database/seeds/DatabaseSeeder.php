<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

<<<<<<< HEAD
		$this->call(MenuTableSeeder::class);
=======
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
>>>>>>> aed47d6d35d79cc9bd58256ef507d61ec6ebfafd

		Model::reguard();
	}
}
