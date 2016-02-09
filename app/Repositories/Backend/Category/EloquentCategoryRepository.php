<?php

namespace App\Repositories\Backend\Category;

use App\Exceptions\GeneralException;
use App\Models\Access\Category\Category;
use App\Repositories\Backend\Role\RoleRepositoryContract;
use App\Exceptions\Backend\Access\User\UserNeedsRolesException;
use App\Repositories\Frontend\User\UserContract as FrontendUserContract;

/**
 * Class EloquentCategoryRepository
 * @package App\Repositories\Category
 */
class EloquentCategoryRepository implements CategoryContract
{

    /**
     * @param  $id
     * @param  bool               $withRoles
     * @throws GeneralException
     * @return mixed
     */
    public function findOrThrowException($id, $withRoles = false)
    {
        $category = Category::find($id);

        if (!is_null($category)) {
            return $category;
        }

        throw new GeneralException(trans('exceptions.backend.access.categories.not_found'));
    }

    /**
     * @param  $per_page
     * @return mixed
     */
    public function getCategoriesPaginated($per_page)
    {
        return Category::paginate($per_page);
    }

    /**
     * @param  $input
     * @throws GeneralException
     * @return bool
     */
    public function create($input)
    {
        $category = $this->createCategoryStub($input);

        if ($category->save()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.categories.create_error'));
    }

    /**
     * @param  $input
     * @return mixed
     */
    private function createCategoryStub($input)
    {
        $category                = new Category();
        $category->name          = $input['name'];
        $category->code          = $input['code'];
        return $category;
    }

    public function getAllCategories() {
        return Category::all();
    }
}
