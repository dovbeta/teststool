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

    /**
     * @param $id
     * @return mixed
     */
    public function init($id);

    /**
     * @param $id
     * @return mixed
     */
    public function finish($id);

    /**
     * @param $task_id
     * @return mixed
     */
    public function getUnAnsweredUserAnswer($task_id);

    /**
     * @param $task_id
     * @param $question_id
     * @param $request
     * @return mixed
     */
    public function updateUserAnswer($task_id, $question_id, $request);
}
