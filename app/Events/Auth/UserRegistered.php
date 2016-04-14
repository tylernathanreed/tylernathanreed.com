<?php

namespace App\Events\Auth;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

use App\Events\Event;

/*
|--------------------------------------------------------------------------
| User Registered Event
|--------------------------------------------------------------------------
|
| This Event is fired when a User is created through the Authentication
| Layer of this Application. Any post-registration type action that
| should follow registration should be listening to this Event.
|
*/
class UserRegistered extends Event
{
    //////////////
    //* Traits *//
    //////////////
	use SerializesModels;

    /////////////////
    //* Variables *//
    /////////////////
    /**
     * The User that recently Registered.
     *
     * @var App\Models\User
     */
    public $user;

    ///////////////////
    //* Constructor *//
    ///////////////////
	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($user)
	{
		$this->user = $user;
	}
}
