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
     * @param int $id
     * @param $request
     * @return mixed
     */
    public function update($id, $request);

    /**
     * @param  $id
     * @return mixed
     */
    public function destroy($id);
}