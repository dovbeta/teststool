<?php

namespace App\Repositories\Frontend\Task;

use App\Models\Quiz\Task\Task;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\Frontend\TaskContract
 */
class EloquentTaskRepository implements TaskContract
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return Task::findOrFail($id);
    }
}