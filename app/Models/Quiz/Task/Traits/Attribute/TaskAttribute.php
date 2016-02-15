<?php

namespace App\Models\Quiz\Task\Traits\Attribute;
use App\Exceptions\GeneralException;
use App\Models\Quiz\Task\Task;
use Carbon\Carbon;

/**
 * Class TaskAttribute
 * @package App\Models\Quiz\Task\Traits\Attribute
 */
trait TaskAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (access()->allow('edit-tasks')) {
            return '<a href="' . route('admin.quiz.tasks.edit', $this->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
        }

        return '';
    }
    /**
     * @return string
     */
    public function getEditForUserButtonAttribute()
    {
        if (access()->allow('edit-tasks')) {
            return '<a href="' . route('admin.access.user.task', [$this->user->id, $this->id]) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (access()->allow('delete-users')) {
            return '<a href="' . route('admin.quiz.tasks.destroy', $this->id) . '" data-method="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEditForUserButtonAttribute() .
        $this->getDeleteButtonAttribute();
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public static function findOrThrowException($id)
    {
        $task = Task::find($id);

        if (!is_null($task)) {
            return $task;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.tasks.not_found'));
    }

}
