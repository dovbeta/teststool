<?php

namespace App\Models\Quiz\Answer\Traits\Relationship;
use App\Models\Quiz\Question\Question;

/**
 * Class AnswerRelationship
 * @package App\Models\Quiz\Answer\Traits\Relationship
 */
trait AnswerRelationship
{

    /**
     * Get the question that the answer belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}