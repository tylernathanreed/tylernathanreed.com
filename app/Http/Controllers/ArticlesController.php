<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Flash;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticlesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Determine all of the Articles
		$articles = Article::all();

		return view('models.articles.index', compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('models.articles.create');
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
		// Create a new Article
		$article = Article::create($request->all());

		// Redirect to the Index Page
		return redirect()->intended(route('articles.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Article  $article  The specified resource.
	 *
	 * @return Response
	 */
	public function show(Article $article)
	{
		return view('models.articles.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Article  $article  The specified resource.
	 *
	 * @return Response
	 */
	public function edit(Article $article)
	{
		return view('models.articles.edit', compact('article'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request  The Update Request.
	 * @param  Article  $article  The specified resource.
	 *
	 * @return Response
	 */
	public function update(Request $request, Article $article)
	{
		// Update the Article
		$article->fill($request->all());

		// Save the Article
		$article->save();

		// Redirect to the Index Page
		return redirect()->intended(route('articles.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Article  $article  The specified resource.
	 *
	 * @return Response
	 */
	public function destroy(Article $article)
	{
		// Flash the Action
		Flash::info('The ' . $article->title . ' Article has been deleted!');

		// Delete the Article
		$article->delete();

		// Redirect to the Index Page
		return redirect()->intended(route('articles.index'));
	}
}
