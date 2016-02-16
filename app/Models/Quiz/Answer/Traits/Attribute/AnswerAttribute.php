<?php

namespace App\Models\Quiz\Answer\Traits\Attribute;

/**
 * trait AnswerAttribute
 * @package App\Models\Quiz\Answer\Traits\Attribute
 */
trait AnswerAttribute
{
    public function scopeCorrect($query) {
        return $query->where('is_correct', '=', '1');
    }


}
