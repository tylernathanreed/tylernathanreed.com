<?php

namespace App\Models\Quiz;

use App\Models\Model;
use App\Models\Concerns\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizQuestion extends Model
{
    use SoftDeletes;

    /**
     * The question type constants.
     *
     * @var string
     */
    const TYPE_MULTIPLE_CHOICE = 'multiple_choice';

    /**
     * The attributes that should be casted.
     *
     * @var array
     */
    protected $casts = [
        'answer_key' => 'json',
        'prompt' => 'json'
    ];

    /**
     * Handles the booting of this model.
     *
     * @return void
     */
    protected static function boot()
    {
        // Call the parent method
        parent::boot();

        // Ensure that the question has a default order
        static::saving(function($question) {
            $question->ensureDefaultOrder();
        });
    }

    /**
     * Ensures that this question has a default order.
     *
     * @return $this
     */
    public function ensureDefaultOrder()
    {
        // If a default order is populated, don't bother
        if(!is_null($this->default_order)) {
            return $this;
        }

        // If a quiz hasn't been associated, don't bother
        if(is_null($this->quiz_id) || is_null($this->quiz)) {
            return $this;
        }

        // Resolve the default order
        $order = $this->resolveDefaultOrder();

        // Assign the default order
        $this->default_order = $order;

        // Allow chaining
        return $this;
    }

    /**
     * Resolves the default order for this question.
     *
     * @return integer
     */
    public function resolveDefaultOrder()
    {
        return $this->quiz->questions()->count() + 1;
    }

    /**
     * Returns the score for the specified answer.
     *
     * @param  string  $answer
     *
     * @return integer
     */
    public function score($answer)
    {
        // If no answer was provided, no points are awarded
        if(is_null($answer)) {
            return 0;
        }

        // Check for an exact match
        if($this->isExactMatch($answer)) {
            return $this->points_available;
        }

        // No points
        return 0;
    }

    /**
     * Returns whether or not the specified answer is an exact match.
     *
     * @param  string  $answer
     *
     * @return boolean
     */
    protected function isExactMatch($answer)
    {
        // Make sure an exact match is available
        if(is_null($exact = ($this->answer_key['exact'] ?? null))) {
            return false;
        }

        // Return the exact match
        return $exact == $answer;
    }

    /**
     * Returns the blade template that renders this question.
     *
     * @return string
     */
    public function getViewTemplate()
    {
        return 'models.quizzes.questions.' . str_replace('_', '-', $this->type);
    }

    /**
     * Returns the quiz that this question belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiz()
    {
        return $this->belongsTo(QuizTemplate::class, 'quiz_id');
    }
}
