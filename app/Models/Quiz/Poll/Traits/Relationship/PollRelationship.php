<?php

namespace App\Models\Quiz\Poll\Traits\Relationship;
use App\Models\Quiz\Category\Category;


/**
 * Class PollRelationship
 * @package App\Models\Quiz\Poll\Traits\Relationship
 */
trait PollRelationship
{

    /**
     * Poll belongs to category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}