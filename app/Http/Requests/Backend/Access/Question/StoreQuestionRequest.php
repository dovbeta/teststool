<?php

namespace App\Http\Requests\Backend\Access\Question;

use App\Http\Requests\Request;

/**
 * Class StoreQuestionRequest
 * @package App\Http\Requests\Backend\Access\Question
 */
class StoreQuestionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-questions');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'                  => 'required',
//            'description'            => 'required',
        ];
    }
}
