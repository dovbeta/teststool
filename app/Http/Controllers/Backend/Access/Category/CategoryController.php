<?php

namespace App\Http\Controllers\Backend\Access\Category;

use App\Http\Requests\Backend\Access\Category\CreateCategoryRequest;
use App\Http\Requests\Backend\Access\Category\DeleteCategoryRequest;
use App\Http\Requests\Backend\Access\Category\EditCategoryRequest;
use App\Http\Requests\Backend\Access\Category\StoreCategoryRequest;
use App\Http\Requests\Backend\Access\Category\UpdateCategoryRequest;
use App\Models\Access\Category\Category;
use App\Repositories\Backend\Category\CategoryContract;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    protected $categories;

    /**
     * @param CategoryContract                 $categories
     */
    public function __construct(
        CategoryContract $categories
    )
    {
        $this->categories       = $categories;
    }

    /**
     * @return mixed
     */
    public function index() {
        return view('backend.access.categories.index')
            ->withCategories($this->categories->getCategoriesPaginated(config('access.users.default_per_page'), 1));
    }

    /**
     * @param  CreateCategoryRequest $request
     * @return mixed
     */
    public function create(CreateCategoryRequest $request)
    {
        return view('backend.access.categories.create');
    }

    /**
     * @param  StoreCategoryRequest $request
     * @return mixed
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->categories->create($request);
        return redirect()->route('admin.access.categories.index')->withFlashSuccess(trans('alerts.backend.categories.created'));
    }

    /**
     * @param  $id
     * @param  EditCategoryRequest $request
     * @return mixed
     */
    public function edit($id, EditCategoryRequest $request)
    {
        $category = $this->categories->findOrThrowException($id);
        return view('backend.access.categories.edit')
            ->withCategory($category);
    }

    /**
     * @param  $id
     * @param  UpdateCategoryRequest $request
     * @return mixed
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $this->categories->update($id, $request);
        return redirect()->route('admin.access.categories.index')->withFlashSuccess(trans('alerts.backend.categories.updated'));
    }

    /**
     * @param  $id
     * @param  DeleteCategoryRequest $request
     * @return mixed
     */
    public function destroy($id, DeleteCategoryRequest $request)
    {
        $this->categories->destroy($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.categories.deleted'));
    }

}
