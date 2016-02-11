<?php

namespace App\Models\Quiz\Poll\Traits\Attribute;

/**
 * Class PollAttribute
 * @package App\Models\Quiz\Poll\Traits\Attribute
 */
trait PollAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (access()->allow('edit-users')) {
            return '<a href="' . route('admin.quiz.polls.edit', $this->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (access()->allow('delete-users')) {
            return '<a href="' . route('admin.quiz.polls.destroy', $this->id) . '" data-method="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute() .
        $this->getDeleteButtonAttribute();
    }
}
