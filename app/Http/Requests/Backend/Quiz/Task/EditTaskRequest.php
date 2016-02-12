<?php

namespace App\Http\Requests\Backend\Quiz\Task;

use App\Http\Requests\Request;

/**
 * Class EditTaskRequest
 * @package App\Http\Requests\Backend\Quiz\Task
 */
class EditTaskRequest extends Request
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
            //
        ];
    }
}
