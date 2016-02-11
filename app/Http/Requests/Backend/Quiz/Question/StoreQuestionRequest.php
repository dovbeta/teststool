<?php

namespace App\Http\Requests\Backend\Quiz\Question;

use App\Http\Requests\Request;

/**
 * Class StoreQuestionRequest
 * @package App\Http\Requests\Backend\Quiz\Question
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
