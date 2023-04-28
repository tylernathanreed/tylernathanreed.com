<?php

namespace Database\Factories\Quiz;

use App\Models\Quiz\QuizQuestion;
use App\Models\Quiz\QuizTemplate;
use Database\Factories\Factory;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class QuizQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuizQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quiz_id' => QuizTemplate::factory()
        ];
    }

    /**
     * Indicates that the question is multiple choice.
     *
     * @return $this
     */
    public function multipleChoice()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'multiple_choice',
                'points_available' => 1
            ];
        });
    }

    /**
     * Indicates that the question is multiple choice.
     *
     * @return $this
     */
    public function trueFalse()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'true_false',
                'points_available' => 1
            ];
        });
    }

    /**
     * Configures this model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (QuizQuestion $question) {
            $this->generatePrompt($question);
        });
    }

    /**
     * Generates the prompt for the specified question.
     *
     * @param  \App\Models\Quiz\QuizQuestion  $question
     *
     * @return $this
     */
    protected function generatePrompt(QuizQuestion $question)
    {
        // If a prompt was provided, leave it alone
        if (! is_null($question->prompt)) {
            return $this;
        }

        // If the type isn't generateable, leave it alone
        if (! in_array($question->type, ['multiple_choice', 'true_false'])) {
            return $this;
        }

        // Generate a random prompt
        $prompt = $this->randomPrompt([
            'type' => $question->type == 'multiple_choice' ? 'multiple' : 'boolean',
            'category' => $question->category,
            'difficulty' => $question->difficulty
        ]);

        unset($question['category']);
        unset($question['difficulty']);

        // Assign the prompt
        $question->prompt = array_filter([
            'question' => $prompt->question,
            'incorrect' => $question->type == 'multiple_choice' ? $prompt->incorrect_answers : null
        ]);

        // Assign the answer key
        $question->answer_key = [
            'exact' => $prompt->correct_answer
        ];

        // Allow chaining
        return $this;
    }

    /**
     * Returns a random prompt based on the specified parameters.
     *
     * @param  array  $parameters
     *
     * @return \stdClass
     */
    protected function randomPrompt(array $parameters)
    {
        // We'll be using an api to generate our questions. To minimize
        // the number of api calls, we're going to cache results and
        // pull larger samples. This will save us time later on.

        // Determine the cache store
        $cache = Cache::store('array');

        // Convert the parameters to a base cache key
        $key = json_encode($parameters);

        // Request a random set of questions
        $questions = $cache->remember("{$key}.response", 0, function () use ($parameters) {

            // Determine the response
            $client = new Client;
            $response = $client->request('GET', 'https://opentdb.com/api.php?amount=10&' . http_build_query($parameters));

            // Decode the results
            return json_decode($response->getBody()->getContents())->results;

        });

        // Determine the current index
        $index = $cache->get("{$key}.index") ?? 0;

        // If the next pull won't have new questions, bust the cache
        if ($index >= 9) {

            // Forget the response
            $cache->forget("{$key}.response");

            // Forget the index
            $cache->forget("{$key}.index");

        }

        // Otherwise, increment the index
        else {
            $cache->put("{$key}.index", $index + 1);
        }

        // Return the current question
        return $questions[$index];
    }
}
