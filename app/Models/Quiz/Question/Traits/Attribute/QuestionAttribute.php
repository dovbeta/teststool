<?php

namespace App\Models\Quiz\Question\Traits\Attribute;

/**
 * Class QuestionAttribute
 * @package App\Models\Quiz\Question\Traits\Attribute
 */
trait QuestionAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (access()->allow('edit-users')) {
            return '<a href="' . route('admin.quiz.questions.edit', $this->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (access()->allow('delete-users')) {
            return '<a href="' . route('admin.quiz.questions.destroy', $this->id) . '" data-method="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';
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
