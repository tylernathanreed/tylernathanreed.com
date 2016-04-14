<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

/*
|--------------------------------------------------------------------------
| Password Reset Controller
|--------------------------------------------------------------------------
|
| This controller is responsible for handling password reset requests
| and uses a simple trait to include this behavior. You're free to
| explore this trait and override any methods you wish to tweak.
|
*/
class PasswordController extends Controller
{
	//////////////
	//* Traits *//
	//////////////
	use ResetsPasswords;

	/**
	 * The View used to display the Email Request Form for Password Resets.
	 *
	 * @var string
	 */
	protected $linkRequestView = 'controllers.auth.passwords.email';

	/**
	 * The View used to display the Password Reset Form for Password Resets.
	 *
	 * @var string
	 */
	protected $resetView = 'controllers.auth.passwords.reset';

	/**
	 * The Subject Line for Password Reset Emails.
	 *
	 * @var string
	 */
	protected $subject = 'Your Password Reset Link';

	/**
	 * Where to redirect Users after their Password has been successfully reset.
	 *
	 * @var string
	 */
	protected $redirectPath = '/';

	///////////////////
	//* Constructor *//
	///////////////////
	/**
	 * Create a new password controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}
}
