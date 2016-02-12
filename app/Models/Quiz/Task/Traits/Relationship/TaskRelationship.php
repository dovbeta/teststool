<?php

namespace App\Models\Quiz\Task\Traits\Relationship;
use App\Models\Access\User\User;
use App\Models\Quiz\Poll\Poll;


/**
 * Class TaskRelationship
 * @package App\Models\Quiz\Poll\Traits\Relationship
 */
trait TaskRelationship
{

    /**
     * Task belongs to user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Task belongs to poll
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
}