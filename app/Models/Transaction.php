<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Transaction Model
|--------------------------------------------------------------------------
|
| The Transaction Model represents a Financial Transaction that a User has
| performed, which may involve themselves and other individuals. These
| may be collective to form a comprehensive Budget for any User.
|
*/
class Transaction extends Model
{
	//////////////
	//* Traits *//
	//////////////
	use Sluggable;

	//////////////////
	//* Attributes *//
	//////////////////
	/**
	 * The attributes that are not mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
}
