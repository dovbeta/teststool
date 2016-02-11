<?php

namespace App\Repositories\Backend\Poll;

use App\Exceptions\GeneralException;
use App\Http\Requests\Backend\Quiz\Poll\StorePollRequest;
use App\Http\Requests\Backend\Quiz\Poll\UpdatePollRequest;
use App\Models\Quiz\Poll\Poll;

/**
 * Class EloquentPollRepository
 * @package App\Repositories\Poll
 */
class EloquentPollRepository implements PollContract
{

    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function findOrThrowException($id)
    {
        $poll = Poll::find($id);

        if (!is_null($poll)) {
            return $poll;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.polls.not_found'));
    }

    /**
     * @param  $per_page
     * @return mixed
     */
    public function getPollsPaginated($per_page)
    {
        return Poll::paginate($per_page);
    }

    /**
     * @param  StorePollRequest $request
     * @throws GeneralException
     * @return bool
     */
    public function create($request)
    {
        $poll = $this->createPollStub($request);

        if ($poll->save()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.polls.create_error'));
    }

    /**
     * @param  $input
     * @return Poll
     */
    private function createPollStub($input)
    {
        $poll                   = new Poll();
        $poll->title            = $input['title'];
        $poll->category_id      = $input['category'];
        $poll->questions_number = $input['questions_number'];
        $poll->time_limit       = $input['time_limit'];
        return $poll;
    }

    /**
     * @param  int $id
     * @param  UpdatePollRequest $request
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $request)
    {
        $poll = $this->findOrThrowException($id);

        if ($poll->update($request->toArray())) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.polls.update_error'));
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        $poll = $this->findOrThrowException($id);
        if ($poll->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.polls.delete_error'));
    }
}
