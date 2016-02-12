<?php

namespace App\Models\Quiz\Answer;

use App\Models\Quiz\Answer\Traits\Attribute\AnswerAttribute;
use App\Models\Quiz\Answer\Traits\Relationship\AnswerRelationship;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use AnswerAttribute, AnswerRelationship;

    /**
     * {@inheritDoc}
     */
    public $timestamps = false;

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'title',
        'is_correct'
    ];
}