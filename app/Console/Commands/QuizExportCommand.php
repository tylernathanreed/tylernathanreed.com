<?php

namespace App\Console\Commands;

use App\Models\Quiz\QuizTemplate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class QuizExportCommand extends Command
{
    use Concerns\QuizSeedData;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quiz:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exports the current quizzes to a seedable json file.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Load all of the quizzes and questions
        $quizzes = QuizTemplate::with('questions')->get();

        // Export the quizzes
        $this->export($quizzes);
    }

    /**
     * Exports the specified quizzes to json.
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $quizzes
     *
     * @return void
     */
    public function export($quizzes)
    {
        // Convert the quizzes to a jsonable array
        $jsonable = $this->toJsonable($quizzes);

        // Convert the array to actual json
        $json = json_encode($jsonable);

        // Write the contents
        File::put($this->getSeedDataPath(), $json);
    }

    /**
     * Converts the specified quizzes to a jsonable array.
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $quizzes
     *
     * @return array
     */
    public function toJsonable($quizzes)
    {
        return $quizzes->map(function ($quiz) {

            // Extract the attributes
            $attributes = $quiz->toArray();

            // Remove the primary key and timestamps
            unset($attributes[$quiz->getKeyName()]);
            unset($attributes[$quiz::CREATED_AT]);
            unset($attributes[$quiz::UPDATED_AT]);
            unset($attributes[$quiz->getDeletedAtColumn()]);

            // Include the questions
            $attributes['questions'] = $quiz->questions->map(function ($question) {

                // Extract the attributes
                $attributes = $question->toArray();

                // Remove the primary key, foreign key, and timestamps
                unset($attributes[$question->getKeyName()]);
                unset($attributes[$question->quiz()->getForeignKeyName()]);
                unset($attributes[$question::CREATED_AT]);
                unset($attributes[$question::UPDATED_AT]);
                unset($attributes[$question->getDeletedAtColumn()]);

                // Return the attributes
                return $attributes;

            })->all();

            // Return the attributes
            return $attributes;

        })->all();
    }
}
