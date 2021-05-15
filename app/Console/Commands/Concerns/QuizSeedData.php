<?php

namespace App\Console\Commands\Concerns;

trait QuizSeedData
{
    /**
     * Returns the path that will/should contain the seed data.
     *
     * @return string
     */
    public function getSeedDataPath()
    {
        return database_path('seeders/data/quizzes.json');
    }
}