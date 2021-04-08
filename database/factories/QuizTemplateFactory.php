<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quiz\QuizTemplate;
use Faker\Generator as Faker;

$factory->define(QuizTemplate::class, function (Faker $faker) {
    return [
        'name' => ucwords(implode(' ', $faker->words(3))),
        'description' => $faker->sentence(12, true)
    ];
});
