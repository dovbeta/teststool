<?php

namespace App\Repositories\Backend\Task;

use App\Exceptions\GeneralException;
use App\Http\Requests\Backend\Quiz\Task\StoreTaskRequest;
use App\Http\Requests\Backend\Quiz\Task\UpdateTaskRequest;
use App\Models\Quiz\Task\Task;
use Carbon\Carbon;

/**
 * Class EloquentTaskRepository
 * @package App\Repositories\Task
 */
class EloquentTaskRepository implements TaskContract
{

    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function findOrThrowException($id)
    {
        $task = Task::find($id);

        if (!is_null($task)) {
            return $task;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.tasks.not_found'));
    }

    /**
     * @param  $per_page
     * @return mixed
     */
    public function getTasksPaginated($per_page)
    {
        return Task::paginate($per_page);
    }

    /**
     * @param  $per_page
     * @return mixed
     */
    public function getActiveTasksPaginated($per_page)
    {
        return Task::active()->paginate($per_page);
    }

    /**
     * @param  $per_page
     * @return mixed
     */
    public function getCompletedTasksPaginated($per_page)
    {
        return Task::completed()->paginate($per_page);
    }

    /**
     * @param  StoreTaskRequest $request
     * @throws GeneralException
     * @return bool
     */
    public function create(StoreTaskRequest $request)
    {
        $task = $this->createTaskStub($request);

        if ($task->save()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.tasks.create_error'));
    }

    /**
     * @param  $input
     * @return Task
     */
    private function createTaskStub($input)
    {
        $task                   = new Task();
        $task->user_id          = $input['user_id'];
        $task->poll_id          = $input['poll_id'];
        return $task;
    }

    /**
     * @param  int $id
     * @param  UpdateTaskRequest $request
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $request)
    {
        $task = $this->findOrThrowException($id);
        $task->updated_at = Carbon::now();

        if ($task->update($request->toArray())) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.tasks.update_error'));
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        $task = $this->findOrThrowException($id);
        if ($task->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.tasks.delete_error'));
    }
}
