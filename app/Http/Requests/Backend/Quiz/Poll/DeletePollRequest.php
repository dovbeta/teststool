<?php

namespace App\Http\Requests\Backend\Quiz\Poll;

use App\Http\Requests\Request;

/**
 * Class DeleteQPollRequest
 * @package App\Http\Requests\Backend\Quiz\Poll
 */
class DeletePollRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('delete-polls');
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
