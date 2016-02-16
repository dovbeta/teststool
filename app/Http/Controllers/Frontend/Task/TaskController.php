<?php

namespace App\Http\Controllers\Frontend\Task;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\User\EloquentUserRepository;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * @var EloquentUserRepository
     */
    protected $users;

    /**
     * @param EloquentUserRepository $users
     */
    public function __construct(EloquentUserRepository $users) {
        $this->users = $users;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function begin()
    {
        //TODO: implement this
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
