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
        static::deleting(function ($quiz) {

            // Delete the questions
            if ($quiz->forceDeleting) {
                $quiz->questions()->forceDelete();
            } else {
                $quiz->questions()->delete();
            }

            // Delete the rankings
            if ($quiz->forceDeleting) {
                $quiz->rankings()->forceDelete();
            } else {
                $quiz->rankings()->delete();
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
        foreach ($this->questions as $question) {

            // Determine the corresponding answer
            $answer = $answers[$question->default_order - 1] ?? null;

            // Determine the points awarded
            $awarded = $question->score($answer);

            // Include the question in the results
            $results['questions'][$question->default_order] = [
                'awarded' => $awarded,
                'available' => $question->points_available,
                'prompt' => $question->prompt['question'],
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
        $results['score'] = round($totalAwarded / $totalAvailable * 100);

        // Return the results
        return $results;
    }

    /**
     * Adds the specified score to the ranking for this quiz.
     *
     * @param  int  $score
     *
     * @return \App\Models\Quiz\QuizRanking
     */
    public function addRanking($score)
    {
        // Determine the ranking
        $ranking = $this->rankings()->firstOrNew(compact('score'), ['count' => 0]);

        // Increase the count
        $ranking->count++;

        // Save the ranking
        $this->rankings()->save($ranking);

        // Return the ranking
        return $ranking;
    }

    /**
     * Returns the ranking breakdown for this quiz.
     *
     * @return array
     */
    public function getRankingBreakdown()
    {
        // Determine the maximum number of points
        $available = $this->questions()->sum('points_available');

        // Determine every possible score
        $scores = array_map(function ($points) use ($available) {
            return round($points / $available * 100);
        }, range(0, $available));

        // Determine the existing rankings
        $rankings = $this->rankings()->pluck('count', 'score')->all();

        // Build a breakdown from the scores and rankings
        return array_combine($scores, array_map(function ($score) use ($rankings) {
            return $rankings[$score] ?? 0;
        }, $scores));
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

    /**
     * Returns the rankings that belong to this quiz.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rankings()
    {
        return $this->hasMany(QuizRanking::class, 'quiz_id');
    }
}
