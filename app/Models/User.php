<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
	//////////////
	//* Traits *//
	//////////////
	use Authenticatable, Authorizable, CanResetPassword;

	//////////////////
	//* Attributes *//
	//////////////////
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/////////////////////
	//* Relationships *//
	/////////////////////
	/**
	 * Returns the Articles that the User authored.
	 *
	 * @return Relationship
	 */
	public function articles()
	{
		return $this->hasMany(Article::class, 'created_by');
	}

	/**
	 * Returns the Roles associated with this User.
	 *
	 * @return Relationship
	 */
	public function roles()
	{
		return $this->belongsToMany(Role::class);
	}

	/////////////////
	//* Accessors *//
	/////////////////
	/**
	 * Returns whether or not this User has at least one of the specified Role(s).
	 *
	 * Usage:
	 *  - $this->is('Role Name');  		// Role Name
	 *  - $this->is(Role::find(...));  	// Role Collection
	 *
	 * @param  mixed  $role  The specified Role (or Roles).
	 *
	 * @return boolean
	 */
	public function is($role)
	{
		// Check for Role Collection
		if($role instanceof Collection)
			return !! $this->roles->intersect($role)->count();

		// Resolve the Role
		$role = Role::resolve($role);

		// Return whether or not the User has the Role
		return $this->roles->contains($role);
	}
}
