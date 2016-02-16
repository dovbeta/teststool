<?php

namespace App\Models\Quiz\Task;

use App\Models\Quiz\Task\Traits\Attribute\TaskAttribute;
use App\Models\Quiz\Task\Traits\Relationship\TaskRelationship;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use TaskAttribute, TaskRelationship;

    protected $fillable = [
        'poll_id',
        'user_id',
    ];

    /**
     * Scope a query to only active Tasks.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query) {
        return $query->where('status', '<>', 'COMPLETED');
    }

    /**
     * Scope a query to only completed Tasks.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCompleted($query) {
        return $query->where('status', '=', 'COMPLETED');
    }


    public function initQuestions()
    {
        //TODO: implement this
    }

}
