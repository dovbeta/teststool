<?php

namespace App\Http\Requests\Backend\Access\Category;

use App\Http\Requests\Request;

/**
 * Class StoreCategoryRequest
 * @package App\Http\Requests\Backend\Access\Category
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
}
