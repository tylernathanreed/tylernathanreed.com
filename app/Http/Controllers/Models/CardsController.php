<?php

namespace App\Http\Controllers\Models;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Card;

class CardsController extends Controller
{
	/**
	 * Displays the Landing Page for Sports Cards.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('models.cards.index');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  string  $sport  The specified Sport to filter Cards.
	 *
	 * @return Response
	 */
	public function sport($sport)
	{
		// Determine all of the Cards
		$cards = Card::all();

		return view('models.cards.sport', compact('cards', 'sport'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('models.cards.create');
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
		// Create a new Card
		$card = Card::create($request->all());

		// Redirect to the Index Page
		return redirect()->intended(route('cards.index'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Card  $card  The specified resource.
	 *
	 * @return Response
	 */
	public function show(Card $card)
	{
		return view('models.cards.show', compact('card'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Card  $card  The specified resource.
	 *
	 * @return Response
	 */
	public function edit(Card $card)
	{
		return view('models.cards.edit', compact('card'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request  The Update Request.
	 * @param  Card  $card  The specified resource.
	 *
	 * @return Response
	 */
	public function update(Request $request, Card $card)
	{
		// Update the Card
		$card->fill($request->all());

		// Save the Card
		$card->save();

		// Redirect to the Index Page
		return redirect()->intended(route('cards.index'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Card  $card  The specified resource.
	 *
	 * @return Response
	 */
	public function destroy(Card $card)
	{
		// Flash the Action
		Flash::info('The ' . $card->title . ' Card has been deleted!');

		// Delete the Card
		$card->delete();

		// Redirect to the Index Page
		return redirect()->intended(route('cards.index'));
	}
}
