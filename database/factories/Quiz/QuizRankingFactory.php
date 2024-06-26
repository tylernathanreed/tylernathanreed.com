<?php

namespace Database\Factories\Quiz;

use App\Models\Quiz\QuizRanking;
use App\Models\Quiz\QuizTemplate;
use Database\Factories\Factory;

class QuizRankingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuizRanking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quiz_id' => QuizTemplate::factory(),
            'score' => $score = rand(0, 100)
        ];
    }

    /**
     * Configures this model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (QuizRanking $ranking) {
            $ranking->count = $ranking->count ?? rand(0, 100 / ($ranking->score + 1));
        });
    }
}
