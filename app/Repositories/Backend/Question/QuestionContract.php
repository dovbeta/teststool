<?php

namespace App\Repositories\Backend\Question;

/**
 * Interface QuestionContract
 * @package App\Repositories\Question
 */
interface QuestionContract
{
    /**
     * @param  $id
     * @return mixed
     */
    public function findOrThrowException($id);

    /**
     * @param  $per_page
     * @return mixed
     */
    public function getQuestionsPaginated($per_page);

    /**
     * @param $input
     * @param $answers
     * @param $categories
     * @return mixed
     */
    public function create($input, $answers, $categories);

    /**
     * @param int $id
     * @param $input
     * @param $answers
     * @param $categories
     * @return mixed
     */
    public function update($id, $input, $answers, $categories);

    /**
     * @param  $id
     * @return mixed
     */
    public function destroy($id);
}
