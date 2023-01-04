<?php

namespace App\Console\Commands;

use App\Models\Quiz\QuizTemplate;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class QuizImportCommand extends Command
{
    use Concerns\QuizSeedData;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quiz:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports existing quizzes from a seedable json file.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Clear all existing quizzes
        QuizTemplate::cursor()->each->forceDelete();

        // Determine the json seed data
        $data = json_decode(File::get($this->getSeedDataPath()), true);

        // Import the data
        $this->import($data);
    }

    /**
     * Imports the specified quiz seed data.
     *
     * @param  array  $data
     *
     * @return void
     */
    public function import($data)
    {
        // Unguard models
        Model::unguard();

        // Iterate through each quiz record
        foreach($data as $record) {

            // Extract the questions
            $questions = $record['questions'];
            unset($record['questions']);

            // Create a quiz from each record
            $quiz = QuizTemplate::create($record);

            // Create the questions
            $quiz->questions()->createMany($questions);

        }

        // Regard models
        Model::reguard();
    }
}
