<?php

namespace App\Models\Quiz\Category;

use App\Models\Quiz\Category\Traits\Attribute\CategoryAttribute;
use App\Models\Quiz\Category\Traits\Relationship\CategoryRelationship;
use App\Models\Quiz\Question\Question;
use Baum\Node;

class Category extends Node
{
    use CategoryAttribute, CategoryRelationship;

    /**
     * {@inheritDoc}
     */
//    protected $orderColumn = 'name';

    /**
     * {@inheritDoc}
     */
    protected $fillable = [
        'name',
        'code',
    ];


//    public function newQuery($excludeDeleted = true) {
//        return parent::newQuery()->orderBy('parent_id')->orderBy('name');
//    }
}
