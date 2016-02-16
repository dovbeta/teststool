<?php

namespace App\Http\Controllers\Backend\Quiz\Result;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Quiz\Task\Task;

class ResultController extends Controller
{
    /**
     * @return mixed
     */
    public function show($task_id) {
        $task = Task::findOrThrowException($task_id);
        return view('backend.quiz.results.show')
            ->withTask($task);
    }
}
