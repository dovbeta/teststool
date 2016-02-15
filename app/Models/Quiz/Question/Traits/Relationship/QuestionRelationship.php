<?php

namespace App\Models\Quiz\Question\Traits\Relationship;

use App\Models\Quiz\Answer\Answer;
use App\Models\Quiz\Category\Category;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;
use \Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * Class QuestionRelationship
 *
 * @package App\Models\Quiz\Question\Traits\Relationship
 *
 * @method BelongsToMany belongsToMany(string $className)
 * @method HasMany hasMany(string $className)
 */
trait QuestionRelationship
{

    /**
     * Many-to-Many relations with Category.
     *
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get all of the answers for the question.
     *
     * @return HasMany
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
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
     * Create multiple answers for the question
     *
     * @param mixed $answers
     * @return void
     */
    public function createAnswers($answers)
    {
        $this->answers()->createMany($answers);
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
                if (isset($answer['id']) && !!$answer['id']) {
                    $this->answers()->updateOrCreate(
                        array_only($answer, ['id']),
                        array_except($answer, ['id'])
                    );
                } else {
                    $this->answers()->create(array_except($answer, ['id']));
                }
            }
        }
    }
}