<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Exceptions\InvalidFactoryException;
use App\Support\ValueObjects\Currency;

class Card extends Model
{
	//////////////////
	//* Attributes *//
	//////////////////
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['sport', 'manufacturer', 'number', 'year', 'rookie', 'price', 'player', 'position', 'team', 'description', 'count'];

	/////////////////////
	//* Boot Override *//
	/////////////////////
	/**
	 * Override the Boot Method to schedule tasks that are Event-Triggered.
	 *
	 * @return void
	 */
	public static function boot()
	{
		// Call the Parent Method
		parent::boot();

		// Intercept the 'Created' Event
		static::creating(function($card)
		{
			// Generate the Slug
			$card->slug = str_slug($card->year . '-' . $card->manufacturer . '-' . $card->team . '-' . $card->player . '-' . $card->number);
		});
	}

	/////////////////
	//* Accessors *//
	/////////////////
	/**
	 * Returns the Price of the Card as a Value Object.
	 *
	 * @return \App\Support\ValueObjects\Currency
	 */
	public function price()
	{
		return new Currency($this->price);
	}

	/////////////////
	//* Factories *//
	/////////////////
	/**
	 * Returns the specified Factory for accessing Team and Positions names.
	 *
	 * @param  string  $sport  The Sport of the specified Factory
	 *
	 * @return \App\Support\Factories\SportFactory
	 *
	 * @throws \App\Exceptions\InvalidFactoryException
	 */
	public static function factory($sport)
	{
		// Determine which Factory to Create
		switch($sport)
		{
			// Baseball Factory
			case 'baseball':
				return new \App\Support\Factories\BaseballFactory;

			// Basketball Factory
			case 'basketball':
				return new \App\Support\Factories\BasketballFactory;

			// Football Factory
			case 'football':
				return new \App\Support\Factories\FootballFactory;

			// Unknown Factory
			default:
				throw new InvalidFactoryException($sport);
		}
	}

	/**
	 * Overrides the $card->factory Attribute to make a static call to
	 * {@see Card::factory} using the Sport value of the Card that
	 * that is using this method. This may throw an exception.
	 *
	 * @return \App\Support\Factories\SportFactory
	 */
	public function getFactoryAttribute()
	{
		// May throw an Exception
		return self::factory($this->sport);
	}
}
