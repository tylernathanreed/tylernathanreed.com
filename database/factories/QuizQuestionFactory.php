<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quiz\QuizQuestion;
use App\Models\Quiz\QuizTemplate;
use Faker\Generator as Faker;
use GuzzleHttp\Client;

$factory->define(QuizQuestion::class, function (Faker $faker) {

    return [
        'quiz_id' => factory(QuizTemplate::class)
    ];

});

$factory->state(QuizQuestion::class, 'multiple_choice', function(Faker $faker) {

    return [
        'type' => 'multiple_choice',
        'points_available' => 1
    ];

});

$factory->state(QuizQuestion::class, 'true_false', function(Faker $faker) {

    return [
        'type' => 'true_false',
        'points_available' => 1
    ];

});

$factory->afterMaking(QuizQuestion::class, function(QuizQuestion $question, Faker $faker) {

    // If a prompt was provided, leave it alone
    if(!is_null($question->prompt)) {
        return;
    }

    // If the type isn't generateable, leave it alone
    if(!in_array($question->type, ['multiple_choice', 'true_false'])) {
        return;
    }

    // We'll be using an api to generate our questions. To minimize
    // the number of api calls, we're going to cache results and
    // pull larger samples. This will save us time later on.

    // Determine the cache store
    $cache = Cache::store('array');

    // Determine the question parameters
    $parameters = [
        'type' => $question->type == 'multiple_choice' ? 'multiple' : 'boolean',
        'category' => $question->category,
        'difficulty' => $question->difficulty
    ];

    // Convert the parameters to a base cache key
    $key = json_encode($parameters);

    // Remove any extra attributes
    unset($question['category']);
    unset($question['difficulty']);

    // Request a random set of questions
    $questions = $cache->remember("{$key}.response", 0, function() use ($parameters) {

        // Determine the response
        $client = new Client;
        $response = $client->request('GET', 'https://opentdb.com/api.php?amount=10&' . http_build_query($parameters));

        // Decode the results
        return json_decode($response->getBody()->getContents())->results;

    });

    // Determine the current index
    $index = $cache->get("{$key}.index") ?? 0;

    // If the next pull won't have new questions, bust the cache
    if($index >= 9) {

        // Forget the response
        $cache->forget("{$key}.response");

        // Forget the index
        $cache->forget("{$key}.index");

    }

    // Otherwise, increment the index
    else {
        $cache->put("{$key}.index", $index + 1);
    }

    // Determine the current question
    $current = $questions[$index];

    // Assign the prompt
    $question->prompt = array_filter([
        'question' => $current->question,
        'incorrect' => $parameters['type'] == 'multiple' ? $current->incorrect_answers : null
    ]);

    // Assign the answer key
    $question->answer_key = [
        'exact' => $current->correct_answer
    ];

});