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
    protected $guarded = ['id'];

    /**
     * {@inheritDoc}
     */
    public $timestamps = false;

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'task_id',
        'question_id',
        'answer_id'
    ];

    /**
     * {@inheritDoc}
     */
    public function __construct(array $attributes = [])
    {
        $this->table = config('quiz.tasks_questions_answers_table');
        parent::__construct($attributes);
    }
}