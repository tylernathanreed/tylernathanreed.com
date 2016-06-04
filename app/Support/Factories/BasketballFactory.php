<?php

namespace App\Support\Factories;

/*
|--------------------------------------------------------------------------
| Basketball Factory
|--------------------------------------------------------------------------
|
| The Basketball Factory is reponsible for knowing all the Positions and
| teams associated with the Basketball Sport. The Teams and Positions
| can be accessed via Methods and Properties within this class.
|
*/
class BasketballFactory extends SportFactory
{
	/**
	 * The Teams associated with this Sport.
	 *
	 * @return array
	 */
	public $teams = [
		'Boston Celtics',
		'Brooklyn Nets',
		'New York Knicks',
		'Philidelphia 76ers',
		'Toronto Raptors',
		'Golden State Warriors',
		'Los Angeles Lakers',
		'Phoenix Suns',
		'Sacramento Kings',
		'Chicago Bulls',
		'Cleveland Cavaliers',
		'Detroit Piston',
		'Indiana Pacers',
		'Milwaukee Bucks',
		'Dallas Mavericks',
		'Houston Rockets',
		'Memphis Grizzlies',
		'New Orleans Pelicans',
		'San Antonio Spurs',
		'Atlanta Hawks',
		'Charlotte Hornets',
		'Miami Heat',
		'Orlando Magic',
		'Washington Wizards',
		'Denver Nuggets',
		'Minnesota Timberwolves',
		'Oklahoma City Thunder',
		'Portland Trail Blazers',
		'Utah Jazz'
	];

	/**
	 * The Positions associated with this Sport.
	 *
	 * @return array
	 */
	public $positions = [
		'Point Guard',
		'Shooting Guard',
		'Small Forward',
		'Power Forward',
		'Center'
	];
}