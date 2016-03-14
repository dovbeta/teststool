<?php

namespace App\Repositories\Frontend\Task;

use App\Exceptions\GeneralException;
use App\Http\Requests\Frontend\Quiz\UpdateUserAnswerRequest;
use App\Models\Quiz\Question\Question;
use App\Models\Quiz\Category\Category;
use App\Models\Quiz\Task\Task;
use App\Models\Quiz\UserAnswer\UserAnswer;
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

            /** @var Category $questionsCategory */
            $categories = $questionsCategory->getDescendantsAndSelf()->pluck('id');

            $questions = Question::with('categories')->whereHas('categories', function($q) use ($categories)
            {
                $q->whereIn('categories.id', $categories);
            })
            ->orderByRaw("RAND()")
            ->take($questionsNumber)
            ->get();


            if ($questions->count() == $questionsNumber) {
                /** @var Question $question */
                foreach ($questions as $question) {
                    $task->userAnswers()->create(['question_id' => $question->id]);
                }

                $task->status = Task::STATUS_IN_PROGRESS;
                $task->started_at = Carbon::now();

                $task->save();

                return true;
            }

            throw new GeneralException(trans('exceptions.frontend.quiz.tasks.not_possible_to_init'));
        }
    }

    /**
     * @param $id
     * @throws GeneralException
     * @return mixed
     */
    public function finish($id)
    {
        $task = $this->findOrThrowException($id);

        if ($task->isInProgress()) {
            $task->status = Task::STATUS_COMPLETED;
            $task->finished_at = Carbon::now();

            $task->save();

            return true;
        }

        throw new GeneralException(trans('exceptions.frontend.quiz.tasks.not_possible_to_init'));
    }

    /**
     * @param integer $task_id
     * @return mixed
     */
    public function getUnAnsweredUserAnswer($task_id)
    {
        return UserAnswer::where(['task_id' => $task_id, 'answer_id' => null])->orderBy('id', 'asc')->first();
    }

    /**
     * @param integer $task_id
     * @param integer $question_id
     * @param $input
     * @return boolean
     * @throws GeneralException
     */
    public function updateUserAnswer($task_id, $question_id, $input)
    {
        $user_answer = UserAnswer::where(['task_id' => $task_id, 'question_id' => $question_id])->first();

        if ($user_answer && $user_answer->update($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.frontend.quiz.tasks.user_answers.update_error'));
    }
}