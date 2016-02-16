<?php

namespace App\Http\Controllers\Frontend\Task;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Task\TaskContract;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * @var TaskContract
     */
    private $taskContract;

    public function __construct(TaskContract $taskContract)
    {
        $this->taskContract = $taskContract;
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
}
