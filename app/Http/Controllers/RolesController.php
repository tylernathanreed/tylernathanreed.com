<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Flash;

use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class RolesController extends Controller
{
	///////////////////
	//* Constructor *//
	///////////////////
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('can:manage-roles');
	}

	///////////////
	//* Actions *//
	///////////////
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Determine all of the Roles
		$roles = Role::with('permissions')->get();

		// Display the Index Page
		return view('models.roles.index', compact('roles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Determine all of the Permissions
		$permissions = Permission::all();

		// Determine all of the Users
		$users = User::with('roles')->get();

		// Display the Create Page
		return view('models.roles.create', compact('permissions', 'users'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request  The Store Request.
	 *
	 * @return Response
	 */
	public function store(RoleRequest $request)
	{
		// Create a new Role
		$role = Role::create($request->all());

		// Determine the Permissions selected for the Role
		$permissions = Role::whereIn('name', $request->permissions)->get()->pluck('id')->toArray();

		// Synchronize the Permissions associated with the Role
		$role->permissions()->sync($permissions);

		// Determine the Users selected for the Role
		$users = User::whereIn('email', $request->users)->get()->pluck('id')->toArray();

		// Synchronize the Users associated with the Role
		$role->users()->sync($users);

		// Return to the Index Page
		return redirect()->intended(route('roles.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Role  $role  The specified resource.
	 *
	 * @return Response
	 */
	public function show(Role $role)
	{
		// Display the Show Page
		return view('models.roles.show', compact('role'));
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Role  $role  The specified resource.
	 *
	 * @return Response
	 */
	public function edit(Role $role)
	{
		// Determine all of the Permissions
		$permissions = Permission::with('roles')->get();

		// Determine all of the Users
		$users = User::with('roles')->get();

		// Display the Edit Page
		return view('models.roles.edit', compact('role', 'permissions', 'users'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request     The Update Request.
	 * @param  Role     $permission  The specified resource.
	 *
	 * @return Response
	 */
	public function update(RoleRequest $request, Role $role)
	{
		// Update the Role
		$role->fill($request->all());

		// Determine the Permissions selected for the Role
		$permissions = Permission::whereIn('name', $request->permissions)->get()->pluck('id')->toArray();

		// Synchronize the Permissions associated with the Role
		$role->permissions()->sync($permissions);

		// Determine the Users selected for the Role
		$users = User::whereIn('email', $request->users)->get()->pluck('id')->toArray();

		// Synchronize the Users associated with the Role
		$role->users()->sync($users);

		// Return to the Index Page
		return redirect()->intended(route('roles.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Role  $role  The specified resource.
	 *
	 * @return Response
	 */
	public function destroy(Role $role)
	{
		// Flash the Action
		Flash::info('The ' . $role->display . ' Role has be deleted.');

		// Delete the Role
		$role->delete();

		// Return to the Index Page
		return redirect()->intended(route('roles.index'));
	}
}
