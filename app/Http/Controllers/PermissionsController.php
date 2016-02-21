<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Flash;

use App\Http\Requests\PermissionRequest;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;

class PermissionsController extends Controller
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
		$this->middleware('can:manage-permissions');
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
		// Determine all of the Permissions
		$permissions = Permission::with('roles')->get();

		// Display the Index Page
		return view('models.permissions.index', compact('permissions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Determine all of the Roles
		$roles = Role::all();

		// Display the Create Page
		return view('models.permissions.create', compact('roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request  The Store Request.
	 *
	 * @return Response
	 */
	public function store(PermissionRequest $request)
	{
		// Create a new Permission
		$permission = Permission::create($request->all());

		// Determine the Roles selected for the Permission
		$roles = Role::whereIn('name', $request->roles)->get()->pluck('id')->toArray();

		// Synchronize the Roles associated with the Permission
		$permission->roles()->sync($roles);

		// Return to the Index Page
		return redirect()->intended(route('permissions.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Permission  $permission  The specified resource.
	 *
	 * @return Response
	 */
	public function show(Permission $permission)
	{
		// Display the Show Page
		return view('models.permissions.show', compact('permission'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Permission  $permission  The specified resource.
	 *
	 * @return Response
	 */
	public function edit(Permission $permission)
	{
		// Determine all of the Roles
		$roles = Role::with('permissions')->get();

		// Display the Edit Page
		return view('models.permissions.edit', compact('permission', 'roles'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request     $request     The Update Request.
	 * @param  Permission  $permission  The specified resource.
	 *
	 * @return Response
	 */
	public function update(PermissionRequest $request, Permission $permission)
	{
		// Update the Permission
		$permission->fill($request->all());

		// Determine the Roles selected for the Permission
		$roles = Role::whereIn('name', $request->roles)->get()->pluck('id')->toArray();

		// Synchronize the Roles associated with the Permission
		$permission->roles()->sync($roles);

		// Return to the Index Page
		return redirect()->intended(route('permissions.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Permission  $permission  The specified resource.
	 *
	 * @return Response
	 */
	public function destroy(Permission $permission)
	{
		// Flash the Action
		Flash::info('The ' . $permission->display . ' Permission has be deleted.');

		// Delete the Permission
		$permission->delete();

		// Return to the Index Page
		return redirect()->intended(route('permissions.index'));
	}
}
