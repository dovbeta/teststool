<?php

namespace App\Http\Controllers\Frontend\Task;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Quiz\UpdateUserAnswerRequest;
use App\Repositories\Frontend\Task\TaskContract;
use App\Repositories\Frontend\User\EloquentUserRepository;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * @var TaskContract
     */
    private $tasks;

    /**
     * @var EloquentUserRepository
     */
    protected $users;

    /**
     * @param TaskContract $tasks
     * @param EloquentUserRepository $users
     */
    public function __construct(TaskContract $tasks, EloquentUserRepository $users)
    {
        $this->tasks = $tasks;
        $this->users = $users;
    }

    /**
     * @param $id
     * @throws GeneralException
     * @return \Illuminate\Http\RedirectResponse
     */
    public function begin($id)
    {
        $this->tasks->init($id);
        return redirect()->route('frontend.tasks.resume', ['id' => $id]);
    }

    /**
     * @param integer $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function resume($id)
    {
        if ($userAnswer = $this->tasks->getUnAnsweredUserAnswer($id)) {
            return view('frontend.tasks.resume')
                ->withTask($this->tasks->find($id))
                ->withUserAnswer($userAnswer);
        } else {
            $this->tasks->finish($id);
            return redirect()->route('frontend.tasks.results', ['id' => $id])->withFlashSuccess(trans('alerts.frontend.tasks.finished'));
        }
    }

    /**
     * @param integer $task_id
     * @param integer $question_id
     * @param UpdateUserAnswerRequest $request
     * @return mixed
     */
    public function updateUserAnswer($task_id, $question_id, UpdateUserAnswerRequest $request)
    {
        $this->tasks->updateUserAnswer($task_id, $question_id, $request->only(['answer_id']));

        return redirect()->route('frontend.tasks.resume', $task_id);
    }

    public function index() {
        return view('frontend.tasks.index')
            ->withUser(access()->user())
            ->withTasks($this->users->getTasksPaginated(config('quiz.tasks.default_per_page'), 1));
    }

    public function results($id) {
        return view('frontend.tasks.results')
            ->withUser(access()->user())
            ->withTask($this->tasks->find($id));
    }

}
