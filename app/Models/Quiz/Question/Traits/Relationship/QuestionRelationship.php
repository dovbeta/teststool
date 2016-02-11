<?php

namespace App\Models\Quiz\Question\Traits\Relationship;
use App\Models\Quiz\Category\Category;


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
}