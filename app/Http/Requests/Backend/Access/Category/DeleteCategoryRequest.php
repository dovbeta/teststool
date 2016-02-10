<?php

namespace App\Http\Requests\Backend\Access\Category;

use App\Http\Requests\Request;

/**
 * Class DeleteCategoryRequest
 * @package App\Http\Requests\Backend\Access\Question
 */
class DeleteCategoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('delete-categories');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
