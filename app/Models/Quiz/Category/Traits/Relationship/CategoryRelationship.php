<?php

namespace App\Models\Quiz\Category\Traits\Relationship;

use App\Models\Quiz\Question\Question;

/**
 * Class CategoryRelationship
 * @package App\Models\Quiz\Category\Traits\Relationship
 */
trait CategoryRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    /**
     * @return mixed
     */
    public function allQuestions() {
        return Question::leftJoin(config('quiz.category_question_table'), config('quiz.questions_table') . '.id', '=', config('quiz.category_question_table') . '.question_id')
            ->whereIn(config('quiz.category_question_table'). '.category_id', $this->getDescendantsAndSelf(['id'])->pluck(['id'])->all());
    }
}