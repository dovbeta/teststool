<?php

namespace App\Models\Quiz\UserAnswer\Traits\Relationship;
use App\Models\Quiz\Answer\Answer;
use App\Models\Quiz\Question\Question;
use App\Models\Quiz\Task\Task;

/**
 * Class UserAnswerRelationship
 * @package App\Models\Quiz\UserAnswer\Traits\Relationship
 */
trait UserAnswerRelationship
{

    /**
     * Get the task that the answer belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * Get the question that the answer belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the question that the answer belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}