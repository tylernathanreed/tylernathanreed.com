<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;

class PagesController extends Controller
{
	/**
	 * Serves the Home Page to the User.
	 *
	 * @return Response:
	 */
	public function home()
	{
		return view('pages.home');
	}

	/**
	 * Serves the Resume Page to the User.
	 *
	 * @return Response:
	 */
	public function resume()
	{
		return view('pages.resume');
	}
}
