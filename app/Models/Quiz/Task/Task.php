<?php

namespace App\Models\Quiz\Task;

use App\Models\Quiz\Task\Traits\Attribute\TaskAttribute;
use App\Models\Quiz\Task\Traits\Relationship\TaskRelationship;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    const STATUS_COMPLETED      = 'COMPLETED';
    const STATUS_PENDING        = 'PENDING';
    const STATUS_IN_PROGRESS    = 'IN-PROGRESS';

    use TaskAttribute, TaskRelationship;

    /**
     * {@inheritDoc}
     */
    protected $guarded = ['id'];

    /**
     * {@inheritDoc}
     */
    protected $dates = ['started_at', 'finished_at'];

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
        return $query->where('status', '<>', self::STATUS_COMPLETED);
    }

    /**
     * Scope a query to only completed Tasks.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCompleted($query) {
        return $query->where('status', '=', self::STATUS_COMPLETED);
    }

    /**
     * @return string
     */
    public function getSpentTimeAttribute()
    {
        return $this->finished_at->diffInMinutes($this->started_at);
    }
}
