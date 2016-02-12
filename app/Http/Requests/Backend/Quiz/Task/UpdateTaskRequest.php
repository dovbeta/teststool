<?php

namespace App\Http\Requests\Backend\Quiz\Task;

use App\Http\Requests\Request;

/**
 * Class UpdateTaskRequest
 * @package App\Http\Requests\Backend\Quiz\Task
 */
class UpdateTaskRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-tasks');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'                  => 'required',
            'poll_id'                  => 'required',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function attributes()
    {
        return [
            'user_id' => trans('validation.attributes.backend.quiz.tasks.user_id'),
            'poll_id' => trans('validation.attributes.backend.quiz.tasks.poll_id'),
        ];
    }
}
