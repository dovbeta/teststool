<?php

namespace App\Models\Quiz\Task\Traits\Attribute;
use App\Exceptions\GeneralException;
use App\Models\Quiz\Task\Task;
use Route;

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
        if (access()->allow('edit-tasks') && $this->isEditable()) {
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
        if (access()->allow('delete-users') && $this->isEditable()) {
            return '<a href="' . route('admin.quiz.tasks.destroy', $this->id) . '" data-method="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getResultsButtonAttribute()
    {
        if (access()->allow('see-results') && $this->isCompleted()) {
            return '<a href="' . route('admin.quiz.results.show', $this->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-list" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.quiz.tasks.results') . '"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getBeginOrContinueButtonAttribute()
    {
        if ($this->isPending()) {
            return '<a href="' . route('frontend.tasks.begin', ['id' => $this->id]) . '" class="btn btn-xs btn-success"><i class="fa fa-play" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.frontend.quiz.tasks.begin') . '"></i></a>';
        } elseif ($this->isInProgress()) {
            return '<a href="' . route('frontend.tasks.resume', ['id' => $this->id]) . '" class="btn btn-xs btn-primary"><i class="fa fa-step-forward" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.frontend.quiz.tasks.resume') . '"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        switch (Route::currentRouteName()) {
            case 'admin.access.user.tasks':
                return
                    $this->getEditForUserButtonAttribute() .
                    $this->getDeleteButtonAttribute() .
                    $this->getResultsButtonAttribute();
                break;
            case 'frontend.user.dashboard':
                return
                $this->getBeginOrContinueButtonAttribute();
                break;
            default:
                return
                    $this->getEditButtonAttribute() .
                    $this->getDeleteButtonAttribute() .
                    $this->getResultsButtonAttribute();
                break;
        }
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

    public function isEditable() {
        return ($this->status === 'PENDING');
    }

    public function isCompleted() {
        return ($this->status === 'COMPLETED');
    }

    public function getCorrectPercentage() {
        return $this->userAnswers->count() ? $this->correctUserAnswers()->count() / $this->userAnswers->count() * 100 : 0;
    }

    public function isPending() {
        return ($this->status === 'PENDING');
    }

    public function isInProgress() {
        return ($this->status === 'IN-PROGRESS');
    }

}
