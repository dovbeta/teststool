<?php

namespace App\Models\Quiz\UserAnswer;

use App\Models\Quiz\UserAnswer\Traits\Attribute\UserAnswerAttribute;
use App\Models\Quiz\UserAnswer\Traits\Relationship\UserAnswerRelationship;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use UserAnswerAttribute, UserAnswerRelationship;

    /**
     * {@inheritDoc}
     */
    public $timestamps = false;

    /**
     * {@inheritDoc}
     */
    protected $table = 'tasks_questions_answers';

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'task_id',
        'question_id',
        'answer_id'
    ];
}