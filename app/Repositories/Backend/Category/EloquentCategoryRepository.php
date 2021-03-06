<?php

namespace App\Repositories\Backend\Category;

use App\Exceptions\GeneralException;
use App\Http\Requests\Backend\Quiz\Category\UpdateCategoryRequest;
use App\Models\Quiz\Category\Category;

/**
 * Class EloquentCategoryRepository
 * @package App\Repositories\Category
 */
class EloquentCategoryRepository implements CategoryContract
{

    /**
     * @param  $id
     * @throws GeneralException
     * @return mixed
     */
    public function findOrThrowException($id)
    {
        $category = Category::find($id);

        if (!is_null($category)) {
            return $category;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.categories.not_found'));
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
     * @return mixed
     */
    public function getRootsCategories()
    {
        return Category::roots()->get();
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

        throw new GeneralException(trans('exceptions.backend.quiz.categories.create_error'));
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
        if (!$input['parent_id']) {
            $category->parent_id = null;
        } else {
            $category->parent_id = $input['parent_id'];
        }
        return $category;
    }

    public function getAllCategories() {
        return Category::all();
    }

    /**
     * @param  int $id
     * @param  UpdateCategoryRequest $request
     * @throws GeneralException
     * @return bool
     */
    public function update($id, $request)
    {
        $category = $this->findOrThrowException($id);
        if (! $request->get('parent_id')) {
            $category->parent_id = null;
        }

        if ($category->update($request->toArray())) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.categories.update_error'));
    }

    /**
     * @param  $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {
        $category = $this->findOrThrowException($id);
        if ($category->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.quiz.categories.delete_error'));
    }

    /**
     * @param  $hierarchy
     * @return bool
     */
    public function updateHierarchy($hierarchy)
    {
        $saveHierarchyItemChildren = function ($category, $hierarchyItem) use (&$saveHierarchyItemChildren){
            if (isset($hierarchyItem['children']) && count($hierarchyItem['children'])) {
                foreach ($hierarchyItem['children'] as $child) {
                    $childCategory = $this
                        ->findOrThrowException((int) $child['id'])
                        ->makeChildOf($category);

                    $saveHierarchyItemChildren($childCategory, $child);
                }
            }
        };

        foreach ($hierarchy as $hierarchyItem) {
            $category = $this->findOrThrowException((int) $hierarchyItem['id'])
                ->makeRoot();

            $saveHierarchyItemChildren($category, $hierarchyItem);
        }

        return true;
    }
}
