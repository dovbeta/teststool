<?php

namespace App\Models\Quiz\Question;

use App\Models\Quiz\Question\Traits\Attribute\QuestionAttribute;
use App\Models\Quiz\Question\Traits\Relationship\QuestionRelationship;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use QuestionAttribute, QuestionRelationship;

    protected $fillable = [
        'title',
        'description',
    ];

}
