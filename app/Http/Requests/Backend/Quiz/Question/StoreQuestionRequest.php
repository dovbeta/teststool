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
            'title' => 'required',
            'question_answers.0.title' => 'required',
            'question_answers.1.title' => 'required',
            'question_answers.2.title' => 'required',
            'question_answers.3.title' => 'required',
            'is_correct' => 'required|in:0,1,2,3',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            'title' => trans('validation.attributes.backend.quiz.questions.title'),
            'question_answers.0.title' => trans('validation.attributes.backend.quiz.questions.numbered_answer', ['number' => 1]),
            'question_answers.1.title' => trans('validation.attributes.backend.quiz.questions.numbered_answer', ['number' => 2]),
            'question_answers.2.title' => trans('validation.attributes.backend.quiz.questions.numbered_answer', ['number' => 3]),
            'question_answers.3.title' => trans('validation.attributes.backend.quiz.questions.numbered_answer', ['number' => 4]),
            'is_correct' => trans('validation.attributes.backend.quiz.questions.is_correct'),
        ];
    }
}
