<?php

namespace App\Support\ValueObjects;

/*
|--------------------------------------------------------------------------
| Currency Value Object
|--------------------------------------------------------------------------
|
| The Currency Value Object represents a form a Currency. The interal
| Currency Value is stored in Cents, but there are several methods
| provided that will format the Currency in a desirable format.
|
*/
class Currency
{
	//////////////////
	//* Attributes *//
	//////////////////
	/**
	 * The number of Cents this Currency represents.
	 *
	 * @var int
	 */
	protected $cents;

	///////////////////
	//* Constructor *//
	///////////////////
	/**
	 * Creates an Instance of this Class.
	 *
	 * @param  int  $cents  The number of Cents for this Currency.
	 *
	 * @return $this
	 */
	public function __construct($cents)
	{
		$this->cents = $cents;
	}

	///////////////////
	//* Conversions *//
	///////////////////
	/**
	 * Formats this Object in Dollars.
	 *
	 * @return float
	 */
	public function inDollars()
	{
		return $this->cents / 100;
	}

	/**
	 * Formats this Object in Cents.
	 *
	 * @return int
	 */
	public function inCents()
	{
		return $this->cents;
	}

	/**
	 * Formats this Object in Currency.
	 *
	 * @param  string  $symbol  The Currency Symbol.
	 *
	 * @return string
	 */
	public function asCurrency($symbol = '$')
	{
		if(function_exists('money_format'))
			return $symbol . money_format('%.2n', $this->inDollars());
		else
			return $symbol . number_format($this->inDollars(), 2);
	}
}
