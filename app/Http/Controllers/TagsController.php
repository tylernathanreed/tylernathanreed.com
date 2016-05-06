<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Flash;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Determine all of the Tags
		$tags = Tag::orderBy('name')->get();

		return view('models.tags.index', compact('tags'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('models.tags.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request  The Store Request.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		// Create a new Tag
		$tag = Tag::create($request->all());

		// Redirect to the Index Page
		return redirect()->intended(route('tags.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Tag  $tag  The specified resource.
	 *
	 * @return Response
	 */
	public function show(Tag $tag)
	{
		return view('models.tags.show', compact('tag'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Tag  $tag  The specified resource.
	 *
	 * @return Response
	 */
	public function edit(Tag $tag)
	{
		return view('models.tags.edit', compact('tag'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request  The Update Request.
	 * @param  Tag  $tag  The specified resource.
	 *
	 * @return Response
	 */
	public function update(Request $request, Tag $tag)
	{
		// Update the Tag
		$tag->fill($request->all());

		// Save the Tag
		$tag->save();

		// Redirect to the Index Page
		return redirect()->intended(route('tags.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Tag  $tag  The specified resource.
	 *
	 * @return Response
	 */
	public function destroy(Tag $tag)
	{
		// Flash the Action
		Flash::info('The ' . $tag->title . ' Tag has been deleted!');

		// Delete the Tag
		$tag->delete();

		// Redirect to the Index Page
		return redirect()->intended(route('tags.index'));
	}
}
