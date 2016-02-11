<?php

namespace App\Repositories\Backend\Question;

use App\Exceptions\GeneralException;
use App\Http\Requests\Backend\Quiz\Question\StoreQuestionRequest;
use App\Http\Requests\Backend\Quiz\Question\UpdateQuestionRequest;
use App\Models\Quiz\Question\Question;

/**
 * Class EloquentCategoryRepository
 * @package App\Repositories\Category
 */
class EloquentQuestionRepository implements QuestionContract
{

    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function findOrThrowException($id)
    {
        $question = Question::find($id);

        if (!is_null($question)) {
            return $question;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.questions.not_found'));
    }

    /**
     * @param  $per_page
     * @return mixed
     */
    public function getQuestionsPaginated($per_page)
    {
        return Question::paginate($per_page);
    }

    /**
     * @param  StoreQuestionRequest $request
     * @throws GeneralException
     * @return bool
     */
    public function create($request)
    {
        $question = $this->createQuestionStub($request);

        if ($question->save()) {
            //Attach new categories
            $question->attachCategories($request->only('question_categories'));
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.questions.create_error'));
    }

    /**
     * @param  $input
     * @return Question
     */
    private function createQuestionStub($input)
    {
        $question                = new Question();
        $question->title          = $input['title'];
        $question->description          = $input['description'];
        return $question;
    }

    /**
     * @param  int $id
     * @param  UpdateQuestionRequest $request
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $request)
    {
        $question = $this->findOrThrowException($id);

        if ($question->update($request->toArray())) {
            $this->flushCategories($request->only('question_categories'), $question);
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.questions.update_error'));
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        $question = $this->findOrThrowException($id);
        if ($question->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.questions.delete_error'));
    }

    /**
     * @param $categories
     * @param Question $question
     */
    private function flushCategories($categories, $question)
    {
        $question->detachCategories($question->categories);
        $question->attachCategories($categories);
    }
}
