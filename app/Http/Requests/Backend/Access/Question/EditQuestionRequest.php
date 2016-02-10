<?php

namespace App\Http\Requests\Backend\Access\Question;

use App\Http\Requests\Request;

/**
 * Class EditQuestionRequest
 * @package App\Http\Requests\Backend\Access\Question
 */
class EditQuestionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-questions');
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
