<?php

namespace App\Repositories\Frontend\Task;

use App\Exceptions\GeneralException;
use App\Models\Quiz\Question\Question;
use App\Models\Quiz\Task\Task;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\Frontend\TaskContract
 */
class EloquentTaskRepository implements TaskContract
{
    /**
     * @param  $id
     * @throws GeneralException
     * @return Task
     */
    public function findOrThrowException($id)
    {
        $task = Task::find($id);

        if (!is_null($task)) {
            return $task;
        }

        throw new GeneralException(trans('exceptions.frontend.quiz.tasks.not_found'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->findOrThrowException($id);
    }

    /**
     * @param $id
     * @throws GeneralException
     * @return mixed
     */
    public function init($id)
    {
        $task = $this->findOrThrowException($id);

        if ($task->isEditable()) {
            $poll = $task->poll;
            $questionsNumber = $poll->questions_number;
            $questionsCategory = $poll->category;

            /** @var Collection $questions */
            $questions = $questionsCategory
                ->questions()
                ->orderByRaw("RAND()")
                ->take($questionsNumber)
                ->get();

            if ($questions->count() == $questionsNumber) {
                /** @var Question $question */
                foreach ($questions as $question) {
                    $task->userAnswers()->create(['question_id' => $question->id]);
                }

                $task->status = Task::STATUS_IN_PROGRESS;
                $task->test_start = Carbon::now();

                $task->save();
                return;
            }

            throw new GeneralException(trans('exceptions.frontend.quiz.tasks.not_possible_to_init'));
        }
    }
}