<?php

namespace App\Models\Quiz\UserAnswer\Traits\Attribute;
use App\Models\Quiz\Answer\Answer;

/**
 * trait UserAnswerAttribute
 * @package App\Models\Quiz\UserAnswer\Traits\Attribute
 */
trait UserAnswerAttribute
{
    /**
     * Get only sent answers
     *
     * @param $query
     * @return mixed
     */
    public function scopeSentAnswers($query) {
        return $query->whereNotNull('answer_id');
    }

    /**
     * Get only sent answers
     *
     * @param $query
     * @return mixed
     */
    public function scopeCorrectAnswers($query) {
        return $query
            ->join('answers', 'answers.id', '=', 'answer_id')
            ->where('is_correct', '=', 1);
    }
}
