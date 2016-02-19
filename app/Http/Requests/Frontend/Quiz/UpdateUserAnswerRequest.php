<?php

namespace App\Http\Requests\Frontend\Quiz;

use App\Http\Requests\Request;

/**
 * Class UpdateUserAnswerRequest
 * @package App\Http\Requests\Frontend\Quiz
 */
class UpdateUserAnswerRequest extends Request
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
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            'answer_id' => 'required|exists:' . config('quiz.answers_table') .',id',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributes()
    {
        return [
            'answer_id' => trans('validation.attributes.frontend.quiz.answer_id'),
        ];
    }
}