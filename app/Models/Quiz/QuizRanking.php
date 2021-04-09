<?php

namespace App\Models\Quiz;

use App\Models\Model;

class QuizRanking extends Model
{
    /**
     * The attributes that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['score'];

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
