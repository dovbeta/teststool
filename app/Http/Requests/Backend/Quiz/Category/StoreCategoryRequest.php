<?php

namespace App\Http\Requests\Backend\Quiz\Category;

use App\Http\Requests\Request;

/**
 * Class StoreCategoryRequest
 * @package App\Http\Requests\Backend\Quiz\Category
 */
class StoreCategoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-categories');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required',
            'code'                  => 'required|unique:categories',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributes()
    {
        return [
            'name' => trans('validation.attributes.backend.quiz.categories.name'),
            'code' => trans('validation.attributes.backend.quiz.categories.code'),
        ];
    }
}
