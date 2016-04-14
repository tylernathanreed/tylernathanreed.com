<?php

use Illuminate\Database\Seeder;

use App\Models\Menu;

class MenuTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Create the Main Menu
		Menu::generate([
			'title' => 'Main Menu - Left',
			'class' => 'nav navbar-nav navbar-left',
			'items' => [
				[
					'name'  => 'Home',
					'route' => 'pages.home',
				],
				[
					'name'  => 'Dashboard',
					'route' => 'dashboard',
				],
				[
					'name'  => 'Articles',
					'route' => 'articles.index',
				],
				[
					'name'  => 'Roles',
					'route' => 'roles.index',
				],
				[
					'name'  => 'Permissions',
					'route' => 'permissions.index',
				],
				[
					'name'  => 'Menus',
					'route' => 'menus.index',
				],
				[
					'name'  => 'Resume',
					'route' => 'pages.resume',
				]
			]
		]);
	}
}
