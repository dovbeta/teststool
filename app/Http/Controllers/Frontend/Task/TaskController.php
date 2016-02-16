<?php

namespace App\Http\Controllers\Frontend\Task;

use App\Http\Controllers\Controller;
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
    private $tasks

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
     * @return \Illuminate\View\View
     */
    public function begin($id)
    {
        $task = $this->taskContract->find($id);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function resume()
    {
        //TODO: implement this
    }

    public function index() {
        return view('frontend.tasks.index')
            ->withUser(access()->user())
            ->withTasks($this->users->getTasksPaginated(config('quiz.tasks.default_per_page'), 1));
    }

}
