<?php

namespace App\Http\Controllers\Models;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Card;

use Flash;

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
	public function sport(Request $request, $sport)
	{
		// Determine all of the Cards
		$cards = $this->search($request, $sport);

		// Determine the Form Information
		$factory = Card::factory($sport);

		$manufacturers = $factory->manufacturers;
		$teams = $factory->teams;
		$positions = $factory->positions;

		// Determine the Search Attributes
		$search = [
			'team' 			=> $request->team,
			'player' 		=> $request->player,
			'position' 		=> $request->position,
			'rookie' 		=> $request->rookie,
			'manufacturer'  => $request->manufacturer,
			'year' 			=> $request->year,
			'number' 		=> $request->number,
			'price' 		=> $request->price,
		];

		// Determine which Search Results need to be Appended
		$append = [];

		foreach($search as $key => $value)
			if(!is_null($value) || ($key == 'rookie' && $value != "2"))
				$append[$key] = $value;

		return view('models.cards.sport', compact('cards', 'sport', 'manufacturers', 'teams', 'positions', 'search', 'append'));
	}

	/**
	 * Search the Collection of the Resources.
	 *
	 * @param  string  $sport  The specified Sport to filter Cards.
	 *
	 * @return Response
	 */
	public function search(Request $request, $sport)
	{
		// Determine all of the Cards
		$cards = Card::where('sport', $sport);

		// Filter by Team
		if($request->has('team'))
			$cards = $cards->where('team', $request->team);

		// Filter by Player
		if($request->has('player'))
			$cards = $cards->where('player', $request->player);

		// Filter by Position
		if($request->has('position'))
			$cards = $cards->where('position', $request->position);

		// Filter by Rookie
		if($request->has('rookie') && $request->rookie != "2")
			$cards = $cards->where('rookie', $request->rookie);

		// Filter by Manufacturer
		if($request->has('manufacturer'))
			$cards = $cards->where('manufacturer', $request->manufacturer);

		// Filter by Year
		if($request->has('year'))
			$cards = $cards->where('year', $request->year + 1900);

		// Filter by Number
		if($request->has('number'))
			$cards = $cards->where('number', $request->number);

		// Filter by Price
		if($request->has('price'))
			$cards = $cards->where('price', $request->price * 100);

		return $cards->paginate(10);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  string  $sport  The Type of Card to Create.
	 *
	 * @return Response
	 */
	public function create($sport)
	{
		// Determine the Form Information
		$factory = Card::factory($sport);

		$manufacturers = $factory->manufacturers;
		$teams = $factory->teams;
		$positions = $factory->positions;

		return view('models.cards.create', compact('sport', 'manufacturers', 'teams', 'positions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request  The Store Request.
	 * @param  string   $sport    The Type of Card to Store.
	 *
	 * @return Response
	 */
	public function store(Request $request, $sport)
	{
		// Mass Assign General Attributes
		$card = new Card($request->all());

		// Assign the Sport
		$card->sport = $sport;

		// Centify the Price
		$card->price *= 100;

		// Centurify the Year
		$card->year += 1900;

		// Save the Card
		$card->save();

		// Redirect to the Show Page
		return redirect()->intended(route('cards.show', ['sport' => $sport, 'card' => $card->slug]));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Card    $card   The specified resource.
	 * @param  string  $sport  The Sport of the specified Card.
	 *
	 * @return Response
	 */
	public function show($sport, Card $card)
	{
		return view('models.cards.show', compact('sport', 'card'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Card    $card   The specified resource.
	 * @param  string  $sport  The Sport of the specified Card.
	 *
	 * @return Response
	 */
	public function edit($sport, Card $card)
	{
		// Determine the Form Information
		$factory = Card::factory($sport);

		$manufacturers = $factory->manufacturers;
		$teams = $factory->teams;
		$positions = $factory->positions;

		return view('models.cards.edit', compact('sport', 'card', 'manufacturers', 'teams', 'positions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request  The Update Request.
	 * @param  string   $sport    The Sport of the specified Card.
	 * @param  Card     $card     The specified resource.
	 *
	 * @return Response
	 */
	public function update(Request $request, $sport, Card $card)
	{
		// Update the Card
		$card->fill($request->all());

		// Centify the Price
		$card->price *= 100;

		// Centurify the Year
		$card->year += 1900;

		// Save the Card
		$card->save();

		// Redirect to the Show Page
		return redirect()->intended(route('cards.show', ['sport' => $sport, 'card' => $card->slug]));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  string  $sport  The Sport of the specified Card.
	 * @param  Card    $card   The specified resource.
	 *
	 * @return Response
	 */
	public function destroy($sport, Card $card)
	{
		// Flash the Action
		Flash::info('The ' . $card->title . ' Card has been deleted!');

		// Delete the Card
		$card->delete();

		// Redirect to the Sport Page
		return redirect()->intended(route('cards.sport', $sport));
	}
}
