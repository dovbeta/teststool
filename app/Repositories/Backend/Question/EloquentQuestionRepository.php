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
     * @return Question|null
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
    public function getQuestionsPaginated($per_page, $category_id = 0)
    {
        if ($category_id) {
            return Question::join('category_question', 'category_question.question_id', '=', 'id')->where('category_question.category_id', '=', $category_id)->paginate($per_page);
        }
        return Question::paginate($per_page);
    }

    /**
     * @param $input
     * @param $answers
     * @param $categories
     * @throws GeneralException
     * @return bool
     */
    public function create($input, $answers, $categories)
    {
        $answers = $this->prepareAnswers($input, $answers);
        $question = $this->createQuestionStub($input);

        if ($question->save()) {
            //Attach new categories
            $question->attachCategories($categories);
            //Create new answers
            $question->createAnswers($answers);
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
        $question = new Question();
        $question->title = $input['title'];
        $question->description = $input['description'];
        return $question;
    }

    /**
     * @param &$input
     * @param $answers
     * @return mixed
     */
    private function prepareAnswers(&$input, $answers) {
        $answers = array_map(function($value, $key) use ($input) {
            $value['is_correct'] = $key == $input['is_correct'];
            return $value;
        }, $answers['question_answers'], array_keys($answers['question_answers']));

        unset($input['is_correct']);

        return $answers;
    }

    /**
     * @param  int $id
     * @param $input
     * @param $answers
     * @param $categories
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $input, $answers, $categories)
    {
        $answers = $this->prepareAnswers($input, $answers);
        $question = $this->findOrThrowException($id);

        if ($question->update($input)) {
            $this->flushCategories($categories, $question);
            //Update answers
            $question->updateAnswers($answers);
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
