<?php

namespace App\Http\Controllers\Backend\Quiz\Question;

use App\Http\Requests\Backend\Quiz\Question\CreateQuestionRequest;
use App\Http\Requests\Backend\Quiz\Question\DeleteQuestionRequest;
use App\Http\Requests\Backend\Quiz\Question\EditQuestionRequest;
use App\Http\Requests\Backend\Quiz\Question\StoreQuestionRequest;
use App\Http\Requests\Backend\Quiz\Question\UpdateQuestionRequest;
use App\Repositories\Backend\Category\CategoryContract;
use App\Repositories\Backend\Question\QuestionContract;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * @var QuestionContract
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
     * @param $category_id
     * @return mixed
     */
    public function index($category_id = null) {
        return view('backend.quiz.questions.index')
            ->withQuestions($this->questions->getQuestionsPaginated(config('quiz.questions.default_per_page'), $category_id))
            ->withCategories($this->categories->getAllCategories())
            ->withCategory($category_id);
    }

    /**
     * @param  CreateQuestionRequest $request
     * @return mixed
     */
    public function create(CreateQuestionRequest $request, $category_id = null)
    {
        return view('backend.quiz.questions.create')
            ->withCategories($this->categories->getRootsCategories())
            ->withQuestionCategories(old('question_categories') ?: ($category_id ? [$category_id] : []));
    }

    /**
     * @param  StoreQuestionRequest $request
     * @return mixed
     */
    public function store(StoreQuestionRequest $request)
    {
        $this->questions->create(
            $request->except('question_answers', 'question_categories'),
            $request->only('question_answers'),
            $request->only('question_categories')
        );
        $goToNew = $request->get('new', false);
        if ($goToNew) {
            if (count($request->get('question_categories')) == 1) {
                return redirect()->route('admin.quiz.questions.create', $request->get('question_categories')[0])->withFlashSuccess(trans('alerts.backend.questions.created'));
            } else {
                return redirect()->route('admin.quiz.questions.create')->withFlashSuccess(trans('alerts.backend.questions.created'));
            }
        } else {
            return redirect()->route('admin.quiz.questions.index')->withFlashSuccess(trans('alerts.backend.questions.created'));
        }
    }

    /**
     * @param  $id
     * @param  EditQuestionRequest $request
     * @return mixed
     */
    public function edit($id, EditQuestionRequest $request)
    {
        $question = $this->questions->findOrThrowException($id);
        return view('backend.quiz.questions.edit')
            ->withQuestion($question)
            ->withQuestionCategories(old('question_categories') ?: $question->categories()->lists('id')->all())
            ->withQuestionAnswers($question->answers()->orderBy('id')->get())
            ->withCategories($this->categories->getRootsCategories());
    }

    /**
     * @param  $id
     * @param  UpdateQuestionRequest $request
     * @return mixed
     */
    public function update($id, UpdateQuestionRequest $request)
    {
        $this->questions->update(
            $id,
            $request->except('question_answers', 'question_categories'),
            $request->only('question_answers'),
            $request->only('question_categories')
        );
        return redirect()->route('admin.quiz.questions.index')->withFlashSuccess(trans('alerts.backend.questions.updated'));
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
