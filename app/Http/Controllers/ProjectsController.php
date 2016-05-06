<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
	/**
	 * Serves the Home Page to the User.
	 *
	 * @return Response
	 */
	public function gameOfLife()
	{
		return view('pages.projects.game-of-life');
	}
}
