<?php

namespace App\Models\Quiz\Category\Traits\Attribute;

/**
 * Class CategoryAttribute
 * @package App\Models\Quiz\Category\Traits\Attribute
 */
trait CategoryAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (access()->allow('edit-categories')) {
            return '<a href="' . route('admin.quiz.categories.edit', $this->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (access()->allow('delete-categories')) {
            return '<a href="' . route('admin.quiz.categories.destroy', $this->id) . '" data-method="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a>';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getQuestionsButtonAttribute()
    {
        return '<a href="' . route('quiz.questions.of-category', $this->id) . '" class="btn btn-xs btn-success"><i class="fa" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.backend.quiz.categories.questions') . '">' . $this->questions()->count() . '</i></a> ';
    }

    /**
     * @return string
     */
    public function getNamedDepthAttribute()
    {
        return str_repeat('-', $this->depth) . ' ' . $this->name;
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getQuestionsButtonAttribute() .
        $this->getEditButtonAttribute() .
        $this->getDeleteButtonAttribute();
    }
}
