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
     * @return mixed
     */
    public function index() {
        return view('backend.quiz.questions.index')
            ->withQuestions($this->questions->getQuestionsPaginated(config('quiz.questions.default_per_page'), 1));
    }

    /**
     * @param  CreateQuestionRequest $request
     * @return mixed
     */
    public function create(CreateQuestionRequest $request)
    {
        return view('backend.quiz.questions.create')
            ->withCategories($this->categories->getAllCategories());
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
        return redirect()->route('admin.quiz.questions.index')->withFlashSuccess(trans('alerts.backend.questions.created'));
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
            ->withQuestionCategories($question->categories()->lists('id')->all())
            ->withQuestionAnswers($question->answers()->orderBy('id')->get())
            ->withCategories($this->categories->getAllCategories());
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
