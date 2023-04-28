<?php

namespace Database\Factories\Quiz;

use App\Models\Quiz\QuizTemplate;
use Database\Factories\Factory;

class QuizTemplateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuizTemplate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucwords(implode(' ', $this->faker->words(3))),
            'description' => $this->faker->sentence(12, true)
        ];
    }
}
