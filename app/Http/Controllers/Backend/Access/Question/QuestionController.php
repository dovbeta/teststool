<?php

namespace App\Http\Controllers\Backend\Access\Question;

use App\Http\Requests\Backend\Access\Category\CreateCategoryRequest;
use App\Http\Requests\Backend\Access\Category\StoreCategoryRequest;
use App\Http\Requests\Backend\Access\Question\CreateQuestionRequest;
use App\Http\Requests\Backend\Access\Question\DeleteQuestionRequest;
use App\Http\Requests\Backend\Access\Question\StoreQuestionRequest;
use App\Models\Access\Question\Question;
use App\Repositories\Backend\Category\CategoryContract;
use App\Repositories\Backend\Question\QuestionContract;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * @var Question
     */
    protected $questions;

    /**
     * @var CategoryContract
     */
    protected $categories;

    /**
     * @param QuestionContract                 $questions
     * @param CategoryContract                 $categories
     */
    public function __construct(
        QuestionContract $questions,
        CategoryContract $categories
    )
    {
        $this->questions       = $questions;
        $this->categories      = $categories;
    }

    /**
     * @return mixed
     */
    public function index() {
        return view('backend.access.questions.index')
            ->withQuestions($this->questions->getQuestionsPaginated(config('access.users.default_per_page'), 1));
    }

    /**
     * @param  CreateQuestionRequest $request
     * @return mixed
     */
    public function create(CreateQuestionRequest $request)
    {
        return view('backend.access.questions.create')
            ->withCategories($this->categories->getAllCategories());
    }

    /**
     * @param  StoreQuestionRequest $request
     * @return mixed
     */
    public function store(StoreQuestionRequest $request)
    {
        $this->questions->create($request);
        return redirect()->route('admin.access.questions.index')->withFlashSuccess(trans('alerts.backend.questions.created'));
    }

    /**
     * @param  $id
     * @param  DeleteQuestionRequest $request
     * @return mixed
     */
    public function destroy($id, DeleteQuestionRequest $request)
    {
        $this->questions->destroy($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.questions.deleted'));
    }

}
