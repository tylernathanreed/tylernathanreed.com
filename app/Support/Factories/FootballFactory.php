<?php

namespace App\Support\Factories;

/*
|--------------------------------------------------------------------------
| Football Factory
|--------------------------------------------------------------------------
|
| The Football Factory is reponsible for knowing all the Positions and
| teams associated with the Football Sport. The Teams and Positions
| can be accessed via Methods and Properties within this class.
|
*/
class FootballFactory extends SportFactory
{
	/**
	 * The Teams associated with this Sport.
	 *
	 * @return array
	 */
	public $teams = [
		'Dallas Cowboys',
		'New York Giants',
		'Philadelphia Eagles',
		'Washington Redskins',
		'Buffalo Bills',
		'Miami Dolphins',
		'New England Patriots',
		'New York Jets',
		'Arizona Cardinals',
		'Los Angeles Rams',
		'San Francisco 49ers',
		'Seattle Seahawks',
		'Denver Broncos',
		'Kansas City Chiefs',
		'Oakland Raiders',
		'San Diego Chargers',
		'Chicago Bears',
		'Detroit Lions',
		'Green Bay Packers',
		'Minnesota Vikings',
		'Baltimore Ravens',
		'Cincinnati Bengals',
		'Cleveland Browns',
		'Pittsburgh Steelers',
		'Atlanta Falcons',
		'Carolina Panthers',
		'New Orleans Saints',
		'Tampa Bay Buccaneers',
		'Houston Texans',
		'Indianapolis Colts',
		'Jacksonville Jaguars',
		'Tennesse Titans'
	];

	/**
	 * The Positions associated with this Sport.
	 *
	 * @return array
	 */
	public $positions = [
		'Quarterback',
		'Halfback',
		'Fullback',
		'Running Back',
		'Cornerback',
		'Center',
		'End',
		'Guard',
		'Middle Linebacker',
		'Outside Linebacker',
		'Safety',
		'Tackle',
		'Wide Receiver'
	];
}