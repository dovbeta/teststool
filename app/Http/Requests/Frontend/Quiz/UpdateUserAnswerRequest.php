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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'answer_id' => 'required',
        ];
    }
}