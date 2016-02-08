<?php

namespace App\Models\Access\Category;

use App\Models\Access\Category\Traits\Attribute\CategoryAttribute;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CategoryAttribute;

    protected $fillable = [
        'name',
        'code',
    ];
}
