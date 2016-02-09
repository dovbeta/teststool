<?php

namespace App\Models\Access\Question;

use App\Models\Access\Question\Traits\Attribute\QuestionAttribute;
use App\Models\Access\Question\Traits\Relationship\QuestionRelationship;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use QuestionAttribute, QuestionRelationship;

    protected $fillable = [
        'title',
        'description',
    ];

}
