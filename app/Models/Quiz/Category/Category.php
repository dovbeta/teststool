<?php

namespace App\Models\Quiz\Category;

use App\Models\Quiz\Category\Traits\Attribute\CategoryAttribute;
use App\Models\Quiz\Category\Traits\Relationship\CategoryRelationship;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CategoryAttribute, CategoryRelationship;

    protected $fillable = [
        'name',
        'code',
    ];

    public function newQuery($excludeDeleted = true) {
        return parent::newQuery()->orderBy('name');
    }


}
