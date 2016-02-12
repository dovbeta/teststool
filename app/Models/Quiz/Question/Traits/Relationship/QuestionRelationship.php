<?php

namespace App\Models\Quiz\Question\Traits\Relationship;
use App\Models\Quiz\Answer\Answer;
use App\Models\Quiz\Category\Category;
use App\Models\Quiz\Question\Question;


/**
 * Class QuestionRelationship
 * @package App\Models\Quiz\Question\Traits\Relationship
 */
trait QuestionRelationship
{

    /**
     * Many-to-Many relations with Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    /**
     * Alias to eloquent many-to-many relation's attach() method.
     *
     * @param  mixed  $category
     * @return void
     */
    public function attachCategory($category)
    {
        if (is_object($category)) {
            $category = $category->getKey();
        }

        $this->categories()->attach($category);
    }

    /**
     * Alias to eloquent many-to-many relation's detach() method.
     *
     * @param  mixed  $category
     * @return void
     */
    public function detachCategory($category)
    {
        if (is_object($category)) {
            $category = $category->getKey();
        }

        if (is_array($category)) {
            $category = $category['id'];
        }

        $this->categories()->detach($category);
    }

    /**
     * Create multiple answers for the question
     *
     * @param mixed $answers
     * @return void
     */
    public function createAnswers($answers)
    {
        if ($answers && is_array($answers)) {
            foreach ($answers as $answer) {
                $this->createAnswer($answer);
            }
        }
    }

    /**
     * Alias to eloquent has-many relation's create() method.
     *
     * @param  mixed  $answer
     * @return void
     */
    public function createAnswer($answer)
    {
        $this->answers()->create($answer);
    }

    /**
     * Update multiple answers for the question
     *
     * @param mixed $answers
     * @return void
     */
    public function updateAnswers($answers)
    {
        if ($answers && is_array($answers)) {
            foreach ($answers as $answer) {
                $this->updateAnswer($answer);
            }
        }
    }

    /**
     * Alias to eloquent has-many relation's create() method.
     *
     * @param  mixed  $answer
     * @return void
     */
    public function updateAnswer($answer)
    {
        $this->answers()->update($answer);
    }

    /**
     * Attach multiple categories to a question
     *
     * @param  mixed  $categories
     * @return void
     */
    public function attachCategories($categories)
    {
        if ($categories && is_array($categories)) {
            foreach ($categories as $category) {
                $this->attachCategory($category);
            }
        }
    }

    /**
     * Detach multiple categories from a question
     *
     * @param  mixed  $categories
     * @return void
     */
    public function detachCategories($categories)
    {
        foreach ($categories as $category) {
            $this->detachCategory($category);
        }
    }

    /**
     * Get all of the answers for the question.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}