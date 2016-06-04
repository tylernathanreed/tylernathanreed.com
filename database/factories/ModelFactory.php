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

/*
|--------------------------------------------------------------------------
| Card Factories
|--------------------------------------------------------------------------
|
| Sports Cards will have different Domains depending upon the Sport. The
| consumer may want a specific Sport, or just a Card in general. This
| means that a general function is needed, as well as specific ones.
|
*/
$generate = function($faker, $sport = null)
{
	$sport = $sport ?: $faker->randomElement(['baseball', 'football', 'basketball']);
	$factory = App\Models\Card::factory($sport);

	return [
		'sport' 		=> $sport,
		'manufacturer' 	=> $faker->randomElement($factory->manufacturers),
		'number' 		=> $faker->numberBetween(1, 500),
		'year' 			=> $faker->numberBetween(1960, 1990),
		'rookie' 		=> $faker->boolean(10),
		'price' 		=> intval($faker->biasedNumberBetween(0, 40, 'Faker\Provider\Biased::linearLow') * 100 + 99),
		'player' 		=> $faker->firstNameMale . ' ' . $faker->lastName,
		'position'  	=> $faker->randomElement($factory->positions),
		'team' 			=> $faker->randomElement($factory->teams)

	];
};

/**
 * Returns the Attributes for a Sports Card.
 *
 * @return array
 */
$factory->define(App\Models\Card::class, function(Faker\Generator $faker) use ($generate)
{
	return $generate($faker);
});

/**
 * Returns the Attributes for a Basketball Card.
 *
 * @return array
 */
$factory->defineAs(App\Models\Card::class, 'basketball', function(Faker\Generator $faker) use ($generate)
{
	return $generate($faker, 'basketball');
});

/**
 * Returns the Attributes for a Baseball Card.
 *
 * @return array
 */
$factory->defineAs(App\Models\Card::class, 'baseball', function(Faker\Generator $faker) use ($generate)
{
	return $generate($faker, 'baseball');
});

/**
 * Returns the Attributes for a Football Card.
 *
 * @return array
 */
$factory->defineAs(App\Models\Card::class, 'football', function(Faker\Generator $faker) use ($generate)
{
	return $generate($faker, 'football');
});