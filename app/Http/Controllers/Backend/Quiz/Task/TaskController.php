<?php

namespace App\Http\Controllers\Backend\Quiz\Task;

use App\Http\Requests\Backend\Quiz\Task\CreateTaskRequest;
use App\Http\Requests\Backend\Quiz\Task\DeleteTaskRequest;
use App\Http\Requests\Backend\Quiz\Task\EditTaskRequest;
use App\Http\Requests\Backend\Quiz\Task\StoreTaskRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Quiz\Task\UpdateTaskRequest;
use App\Models\Quiz\Poll\Poll;
use App\Repositories\Backend\Task\TaskContract;

class TaskController extends Controller
{
    /**
     * @var TaskContract
     */
    protected $tasks;

    /**
     * @param TaskContract                 $tasks
     */
    public function __construct(TaskContract $tasks)
    {
        $this->tasks            = $tasks;
    }

    /**
     * @return mixed
     */
    public function index() {
//        return view('backend.quiz.polls.index')
//            ->withPolls($this->polls->getPollsPaginated(config('quiz.polls.default_per_page'), 1));
    }

    /**
     * @param  CreatePollRequest $request
     * @return mixed
     */
    public function create(CreatePollRequest $request)
    {
//        return view('backend.quiz.polls.create')
//            ->withCategories($this->categories->getAllCategories());
    }

    /**
     * @param  StoreTaskRequest $request
     * @return mixed
     */
    public function store(StoreTaskRequest $request)
    {
        $this->tasks->create($request);
        return redirect()->route('admin.access.user.tasks', $request->get('user_id'))->withFlashSuccess(trans('alerts.backend.tasks.created'));
    }

    /**
     * @param  $id
     * @param  EditTaskRequest $request
     * @return mixed
     */
    public function edit($id, EditTaskRequest $request)
    {
        return view('backend.quiz.tasks.edit')
            ->withTask($this->tasks->findOrThrowException($id))
            ->withPolls(Poll::all()->pluck('title', 'id'));
    }

    /**
     * @param  $id
     * @param  UpdateTaskRequest $request
     * @return mixed
     */
    public function update($id, UpdateTaskRequest $request)
    {
        $this->tasks->update($id, $request);
        return redirect()->route('admin.access.user.tasks', $request->get('user_id'))->withFlashSuccess(trans('alerts.backend.tasks.updated'));
    }

    /**
     * @param  $id
     * @param  DeleteTaskRequest $request
     * @return mixed
     */
    public function destroy($id, DeleteTaskRequest $request)
    {
        $this->tasks->destroy($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.tasks.deleted'));
    }

}
