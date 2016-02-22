<?php

namespace App\Http\Controllers\Backend\Quiz\Category;

use App\Http\Requests\Backend\Quiz\Category\CreateCategoryRequest;
use App\Http\Requests\Backend\Quiz\Category\DeleteCategoryRequest;
use App\Http\Requests\Backend\Quiz\Category\EditCategoryRequest;
use App\Http\Requests\Backend\Quiz\Category\StoreCategoryRequest;
use App\Http\Requests\Backend\Quiz\Category\UpdateCategoryRequest;
use App\Http\Requests\Backend\Quiz\Category\SortCategoriesRequest;
use App\Models\Quiz\Category\Category;
use App\Repositories\Backend\Category\CategoryContract;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * @var Category
     */
    protected $categories;

    /**
     * @param CategoryContract $categories
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
        return view('backend.quiz.categories.index')
            ->withCategories($this->categories->getRootsCategories());
    }

    /**
     * @param  CreateCategoryRequest $request
     * @return mixed
     */
    public function create(CreateCategoryRequest $request)
    {
        return view('backend.quiz.categories.create');
    }

    /**
     * @param  StoreCategoryRequest $request
     * @return mixed
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->categories->create($request);
        return redirect()->route('admin.quiz.categories.index')->withFlashSuccess(trans('alerts.backend.categories.created'));
    }

    /**
     * @param  $id
     * @param  EditCategoryRequest $request
     * @return mixed
     */
    public function edit($id, EditCategoryRequest $request)
    {
        $category = $this->categories->findOrThrowException($id);
        var_dump((array) $category->allQuestions());
        return view('backend.quiz.categories.edit')
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
        return redirect()->route('admin.quiz.categories.index')->withFlashSuccess(trans('alerts.backend.categories.updated'));
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

    /**
     * @param  SortCategoriesRequest      $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateHierarchy(SortCategoriesRequest $request)
    {
        $this->categories->updateHierarchy($request->get('data'));
        return response()->json(['status' => 'OK']);
    }
}
