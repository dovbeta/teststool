<?php

namespace App\Models\Quiz\Poll;

use App\Models\Quiz\Poll\Traits\Attribute\PollAttribute;
use App\Models\Quiz\Poll\Traits\Relationship\PollRelationship;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use PollAttribute, PollRelationship;

    protected $fillable = [
        'title',
        'category_id',
        'questions_number',
        'time_limit',
    ];

    public function newQuery($excludeDeleted = true)
    {
        return parent::newQuery()->orderBy('title');
    }

}
