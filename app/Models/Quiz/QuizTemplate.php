<?php

namespace App\Models\Quiz;

use App\Models\Concerns\Sluggable;
use App\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizTemplate extends Model
{
    use Sluggable, SoftDeletes;

    /**
     * Boots this model.
     *
     * @return void
     */
    protected static function boot()
    {
        // Call the parent method
        parent::boot();

        // When this model is being deleted...
        static::deleting(function($quiz) {

            // Delete the questions
            if($quiz->forceDeleting) {
                $quiz->questions()->forceDelete();
            } else {
                $quiz->questions()->delete();
            }

        });
    }

    /**
     * Returns the score results using the given answers.
     *
     * @param  array  $answers
     *
     * @return array
     */
    public function score($answers)
    {
        // Initialize the totals
        $totalAwarded = 0;
        $totalAvailable = 0;

        // Iterate through each question
        foreach($this->questions as $question) {

            // Determine the corresponding answer
            $answer = $answers[$question->default_order - 1] ?? null;

            // Determine the points awarded
            $awarded = $question->score($answer);

            // Include the question in the results
            $results['questions'][$question->default_order] = [
                'awarded' => $awarded,
                'available' => $question->points_available,
                'provided' => $answer,
                'answer' => $question->answer_key['exact'],
                'status' => $question->points_available == $awarded ? 'correct' : 'incorrect',
            ];

            // Update the totals
            $totalAwarded += $awarded;
            $totalAvailable += $question->points_available;

        }

        // Include the totals
        $results['total_awarded'] = $totalAwarded;
        $results['total_available'] = $totalAvailable;

        // Return the results
        return $results;
    }

    /**
     * Returns the questions that belong to this quiz.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id');
    }
}
