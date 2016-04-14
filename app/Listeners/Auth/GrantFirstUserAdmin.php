<?php

namespace App\Listeners\Auth;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Events\Auth\UserRegistered;

/*
|--------------------------------------------------------------------------
| Grant First User Admin Listener
|--------------------------------------------------------------------------
|
| This Listener listens to the User Registered Event. When the listened
| Event is fired, this Listener attempts to determine whether or not
| the registered User was the first registered User, and if so,
| grant them Administrator priviledges.
|
*/
class GrantFirstUserAdmin
{
	/**
	 * Handle the event.
	 *
	 * @param  UserRegistered  $event
	 * @return void
	 */
	public function handle(UserRegistered $event)
	{
		// Determine if the Registered User was the first Registered User
		if(User::count() == 0)
			Role::findAdministrator()->attach($event->user);
	}
}
