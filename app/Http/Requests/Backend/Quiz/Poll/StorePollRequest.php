<?php

namespace App\Http\Requests\Backend\Quiz\Poll;

use App\Http\Requests\Request;

/**
 * Class StorePollRequest
 * @package App\Http\Requests\Backend\Quiz\Poll
 */
class StorePollRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-polls');
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
            'category'               => 'required',
            'questions_number'       => 'required|integer|between:1,100',
            'time_limit'             => 'required|integer|between:1,480',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributes()
    {
        return [
            'title' => trans('validation.attributes.backend.quiz.polls.title'),
            'category' => trans('validation.attributes.backend.quiz.polls.category'),
            'questions_number' => trans('validation.attributes.backend.quiz.polls.questions_number'),
            'time_limit' => trans('validation.attributes.backend.quiz.polls.time_limit'),
        ];
    }
}
