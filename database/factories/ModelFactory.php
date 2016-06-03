<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\Card::class, function(Faker\Generator $faker)
{
	$sport = $faker->randomElement(['baseball', 'football', 'basketball']);

	switch($sport)
	{
		case 'football':
			$position = $faker->randomElement(App\Models\Card::getFootballPositions());
			$team = $faker->randomElement(App\Models\Card::getFootballTeams());
			break;

		case 'baseball':
			$position = $faker->randomElement(App\Models\Card::getBaseballPositions());
			$team = $faker->randomElement(App\Models\Card::getBaseballTeams());
			break;

		case 'basketball':
			$position = $faker->randomElement(App\Models\Card::getBasketballPositions());
			$team = $faker->randomElement(App\Models\Card::getBasketballTeams());
			break;
	}

	return [
		'sport' 	=> $sport,
		'number' 	=> $faker->numberBetween(1, 500),
		'year' 		=> $faker->numberBetween(1960, 1990),
		'rookie' 	=> $faker->boolean(10),
		'price' 	=> intval($faker->biasedNumberBetween(0, 40, 'Faker\Provider\Biased::linearLow') * 100 + 99),
		'player' 	=> $faker->firstNameMale . ' ' . $faker->lastName,
		'position'  => $position,
		'team' 		=> $team

	];
});

$factory->define(App\Models\Permission::class, function(Faker\Generator $faker)
{
	return [
		'display' 		=> $faker->name,
		'description' 	=> $faker->paragraph
	];
});

$factory->define(App\Models\Role::class, function(Faker\Generator $faker)
{
	return [
		'display' 		=> $faker->name,
		'description' 	=> $faker->paragraph
	];
});