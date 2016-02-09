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
     * List all categories
     *
     * @return mixed
     */
    public function getAllCategories();

}
