<?php

namespace App\Support\Factories;

/*
|--------------------------------------------------------------------------
| Baseball Factory
|--------------------------------------------------------------------------
|
| The Baseball Factory is reponsible for knowing all the Positions and
| teams associated with the Baseball Sport. The Teams and Positions
| can be accessed via Methods and Properties within this class.
|
*/
class BaseballFactory extends SportFactory
{
	/**
	 * The Teams associated with this Sport.
	 *
	 * @return array
	 */
	public $teams = [
		'Baltimore Orioles',
		'Boston Red Sox',
		'New York Yankees',
		'Tampa Bay Rays',
		'Toronto Blue Jays',
		'Atlanta Braves',
		'Miami Marlins',
		'New York Mets',
		'Philadelphia Phillies',
		'Washington Nationals',
		'Chicago White Sox',
		'Cleveland Indians',
		'Detroit Tigers',
		'Kansas City Royals',
		'Minnesota Twins',
		'Chicago Cubs',
		'Cincinnati Reds',
		'Milwaukee Brewers',
		'Pittsburgh Pirates',
		'St. Louis Cardinals',
		'Houston Astros',
		'Los Angeles Angels',
		'Oakland Athletics',
		'Seattle Mariners',
		'Texas Rangers',
		'Arizona Diamondbacks',
		'Colorado Rockies',
		'Los Angeles Dodgers',
		'San Diego Padres',
		'San Francisco Giants'
	];

	/**
	 * The Positions associated with this Sport.
	 *
	 * @return array
	 */
	public $positions = [
		'Pitcher',
		'Catcher',
		'First Baseman',
		'Second Baseman',
		'Third Baseman',
		'Shortstop',
		'Left Fielder',
		'Center Fielder',
		'Right Fielder'
	];
}