<?php

namespace App\Http\Requests\Backend\Quiz\Category;

use App\Http\Requests\Request;

/**
 * Class SortCategoriesRequest
 * @package App\Http\Requests\Backend\Quiz\Category
 */
class SortCategoriesRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
