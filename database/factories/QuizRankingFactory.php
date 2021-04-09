<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quiz\QuizRanking;
use App\Models\Quiz\QuizTemplate;
use Faker\Generator as Faker;

$factory->define(QuizRanking::class, function (Faker $faker) {

    return [
        'quiz_id' => factory(QuizTemplate::class),
        'score' => $score = rand(0, 100)
    ];

});

$factory->afterMaking(QuizRanking::class, function(QuizRanking $ranking, Faker $faker) {

    // If a count was provided, leave it alone
    if(!is_null($ranking->count)) {
        return;
    }

    // Add a count
    $ranking->count = rand(0, 100 / ($ranking->score + 1));

});