<?php

namespace App\Http\Requests\Backend\Quiz\Poll;

use App\Http\Requests\Request;

/**
 * Class CreatePollRequest
 * @package App\Http\Requests\Backend\Quiz\Poll
 */
class CreatePollRequest extends Request
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
            //
        ];
    }
}
