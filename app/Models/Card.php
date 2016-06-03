<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
	public static function getFootballPositions()
	{
		return [
			'Quarterback',
			'Halfback / Running Back',
			'Fullback / Running Back',
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

	public static function getBaseballPositions()
	{
		return [
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

	public static function getBasketballPositions()
	{
		return [
			'Point Guard',
			'Shooting Guard',
			'Small Forward',
			'Power Forward',
			'Center'
		];
	}

	public static function getFootballTeams()
	{
		return [
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
	}

	public static function getBaseballTeams()
	{
		return [
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
	}

	public static function getBasketballTeams()
	{
		return [
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
	}
}
