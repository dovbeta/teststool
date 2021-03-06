<?php

namespace App\Repositories\Backend\Category;

/**
 * Interface CategoryContract
 * @package App\Repositories\Category
 */
interface CategoryContract
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
    public function getCategoriesPaginated($per_page);

    /**
     * @return mixed
     */
    public function getRootsCategories();

    /**
     * List all categories
     *
     * @return mixed
     */
    public function getAllCategories();

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

    /**
     * @param  $input
     * @return mixed
     */
    public function updateHierarchy($input);

}
