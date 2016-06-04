<?php

namespace App\Support\Factories;

/*
|--------------------------------------------------------------------------
| Sport Factory
|--------------------------------------------------------------------------
|
| The Sport Factory is reponsible for knowing all the Teams and Positions
| associated with the Sport. The Sport itself is an abstract concept,
| therefore the Concrete Child Class provides all of the data.
|
*/
abstract class SportFactory
{
	/**
	 * The Manufacturers that create Sports Cards.
	 *
	 * @var array
	 */
	public $manufacturers = [
		'Action Packed',
		'Bowman Gum',
		'Donruss',
		'Fleer',
		'Futera',
		'Leaf',
		'O-Pee-Chee',
		'Panini',
		'Pinnacle',
		'Press Pass',
		'Pro Set',
		'Razor',
		'SkyBox',
		'Topps',
		'Upper Deck'
	];

	/**
	 * Returns the Teams associated with this Sport.
	 *
	 * @return array
	 */
	public function manufacturers()
	{
		// Return the Teams Property, if it exists
		if(property_exists($this, 'manufacturers'))
			return $this->manufacturers;

		// Return an empty Array
		return [];
	}

	/**
	 * Returns the Teams associated with this Sport.
	 *
	 * @return array
	 */
	public function teams()
	{
		// Return the Teams Property, if it exists
		if(property_exists($this, 'teams'))
			return $this->teams;

		// Return an empty Array
		return [];
	}

	/**
	 * Returns the Positions associated with this Sport.
	 *
	 * @return array
	 */
	public function positions()
	{
		// Return the Teams Property, if it exists
		if(property_exists($this, 'positions'))
			return $this->positions;

		// Return an empty Array
		return [];
	}
}