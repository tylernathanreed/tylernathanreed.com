<?php

namespace App\Http\Middleware;

use Closure;
use Gate;
use Flash;
use Auth;

class Authorize
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $permission)
	{
		if(Gate::denies($permission))
		{
			// Redirect to Profile Page for Authenticated Users
			$route = route(Auth::guest() ? 'pages.home' : 'dashboard');

			Flash::danger('You do not have permission to do that!');

			return redirect($route);
		}

		return $next($request);
	}
}
