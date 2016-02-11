<?php

namespace App\Http\Controllers\Backend\Quiz\Poll;

use App\Http\Requests\Backend\Quiz\Poll\CreatePollRequest;
use App\Http\Requests\Backend\Quiz\Poll\DeletePollRequest;
use App\Http\Requests\Backend\Quiz\Poll\EditPollRequest;
use App\Http\Requests\Backend\Quiz\Poll\StorePollRequest;
use App\Http\Requests\Backend\Quiz\Poll\UpdatePollRequest;
use App\Repositories\Backend\Category\CategoryContract;
use App\Repositories\Backend\Poll\PollContract;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PollController extends Controller
{
    /**
     * @var PollContract
     */
    protected $polls;
    /**
     * @var CategoryContract
     */
    protected $categories;

    /**
     * @param PollContract                 $polls
     * @param CategoryContract             $categories
     */
    public function __construct(PollContract $polls, CategoryContract $categories)
    {
        $this->polls            = $polls;
        $this->categories       = $categories;
    }

    /**
     * @return mixed
     */
    public function index() {
        return view('backend.quiz.polls.index')
            ->withPolls($this->polls->getPollsPaginated(config('quiz.polls.default_per_page'), 1));
    }

    /**
     * @param  CreatePollRequest $request
     * @return mixed
     */
    public function create(CreatePollRequest $request)
    {
        return view('backend.quiz.polls.create')
            ->withCategories($this->categories->getAllCategories());
    }

    /**
     * @param  StorePollRequest $request
     * @return mixed
     */
    public function store(StorePollRequest $request)
    {
        $this->polls->create($request);
        return redirect()->route('admin.quiz.polls.index')->withFlashSuccess(trans('alerts.backend.polls.created'));
    }

    /**
     * @param  $id
     * @param  EditPollRequest $request
     * @return mixed
     */
    public function edit($id, EditPollRequest $request)
    {
        $poll = $this->polls->findOrThrowException($id);
        return view('backend.quiz.polls.edit')
            ->withPoll($poll)
            ->withCategories($this->categories->getAllCategories());
    }

    /**
     * @param  $id
     * @param  UpdatePollRequest $request
     * @return mixed
     */
    public function update($id, UpdatePollRequest $request)
    {
        $this->polls->update($id, $request);
        return redirect()->route('admin.quiz.polls.index')->withFlashSuccess(trans('alerts.backend.polls.updated'));
    }

    /**
     * @param  $id
     * @param  DeletePollRequest $request
     * @return mixed
     */
    public function destroy($id, DeletePollRequest $request)
    {
        $this->polls->destroy($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.polls.deleted'));
    }

}
