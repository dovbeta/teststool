<?php

namespace App\Models\Access\Category;

use App\Models\Access\Category\Traits\Attribute\CategoryAttribute;
use App\Models\Access\Category\Traits\Relationship\CategoryRelationship;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CategoryAttribute, CategoryRelationship;

    protected $fillable = [
        'name',
        'code',
    ];

}
