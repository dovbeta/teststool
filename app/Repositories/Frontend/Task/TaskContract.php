<?php

namespace App\Repositories\Frontend\Task;

/**
 * Interface TaskContract
 * @package App\Repositories\Frontend\Task
 */
interface TaskContract
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id);
}
