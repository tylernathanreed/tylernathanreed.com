<?php

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;

use App\Models\Menu;

class ComponentComposer
{
	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$view->with('mainMenuLeft', Menu::where('slug', 'main-menu-left')->first());
	}
}