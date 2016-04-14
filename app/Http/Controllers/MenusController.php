<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Http\Requests;
use App\Models\Menu;
use App\Models\Permission;

use Flash;

class MenusController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Determine all of the Menus
		$menus = Menu::all();

		return view('models.menus.index', compact('menus'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('models.menus.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request  The Store Request.
	 *
	 * @return Response
	 */
	public function store(MenuRequest $request)
	{
		// Create a new Menu
		$menu = Menu::generate($request->all());

		// Redirect to the Index Page
		return redirect()->intended(route('menus.show', $menu->slug));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Menu  $menu  The specified resource.
	 *
	 * @return Response
	 */
	public function show(Menu $menu)
	{
		return view('models.menus.show', compact('menu'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Menu  $menu  The specified resource.
	 *
	 * @return Response
	 */
	public function edit(Menu $menu)
	{
		// Determine all of the Permissions
		$permissions = Permission::all();

		return view('models.menus.edit', compact('menu', 'permissions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request  The Update Request.
	 * @param  Menu  $menu  The specified resource.
	 *
	 * @return Response
	 */
	public function update(MenuRequest $request, Menu $menu)
	{
		// Update the Menu
		$menu->regenerate($request->all());

		// Save the Menu
		$menu->save();

		// Redirect to the Index Page
		return redirect()->intended(route('menus.show', $menu->slug));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Menu  $menu  The specified resource.
	 *
	 * @return Response
	 */
	public function destroy(Menu $menu)
	{
		// Flash the Action
		Flash::info('The ' . $menu->title . ' Menu has been deleted!');

		// Delete the Menu
		$menu->delete();

		// Redirect to the Index Page
		return redirect()->intended(route('menus.index'));
	}
}
