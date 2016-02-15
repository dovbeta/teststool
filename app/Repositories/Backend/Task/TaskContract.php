<?php

namespace App\Repositories\Backend\Task;

/**
 * Interface TaskContract
 * @package App\Repositories\Task
 */
interface TaskContract
{
    /**
     * @param  $id
     * @return mixed
     */
    public function findOrThrowException($id);

    /**
     * @param  $per_page
     * @return mixed
     */
    public function getTasksPaginated($per_page);

    /**
     * @param  $per_page
     * @return mixed
     */
    public function getActiveTasksPaginated($per_page);

    /**
     * @param  $per_page
     * @return mixed
     */
    public function getCompletedTasksPaginated($per_page);

    /**
     * @param int $id
     * @param $request
     * @return mixed
     */
    public function update($id, $request);

    /**
     * @param  $id
     * @return mixed
     */
    public function destroy($id);
}
