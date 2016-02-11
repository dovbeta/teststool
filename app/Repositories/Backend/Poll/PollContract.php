<?php

namespace App\Repositories\Backend\Poll;

/**
 * Interface PollContract
 * @package App\Repositories\Poll
 */
interface PollContract
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
    public function getPollsPaginated($per_page);

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
