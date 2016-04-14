<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('controllers.dashboard.index');
	}

	/**
	 * Shows the User the Form for Managing their Profile.
	 *
	 * @return Response
	 */
	public function settings()
	{
		return view('controllers.dashboard.settings');
	}
}
