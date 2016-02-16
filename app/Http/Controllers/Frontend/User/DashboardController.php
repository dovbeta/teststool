<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\User\EloquentUserRepository;

/**
 * Class DashboardController
 * @package App\Http\Controllers\Frontend
 */
class DashboardController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('frontend.user.dashboard')
            ->withUser(access()->user())
            ->withTasks($this->users->getTasksPaginated(config('quiz.tasks.default_per_page'), 1));
    }
}
