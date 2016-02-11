<?php

namespace App\Http\Requests\Backend\Quiz\Question;

use App\Http\Requests\Request;

/**
 * Class UpdateQuestionRequest
 * @package App\Http\Requests\Backend\Quiz\Question
 */
class UpdateQuestionRequest extends Request
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
            'title'  => 'required',
//            'description'  => 'required|unique:categories',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributes()
    {
        return [
            'title' => trans('validation.attributes.backend.quiz.questions.title'),
        ];
    }
}
