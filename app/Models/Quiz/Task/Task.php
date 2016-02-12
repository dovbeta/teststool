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

}
