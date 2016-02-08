<?php

namespace App\Http\Controllers\Backend\Access\Category;

use App\Http\Requests\Backend\Access\Category\CreateCategoryRequest;
use App\Http\Requests\Backend\Access\Category\StoreCategoryRequest;
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

}
