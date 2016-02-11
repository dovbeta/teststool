<?php

namespace App\Models\Quiz\Category\Traits\Relationship;

use App\Models\Quiz\Question\Question;

/**
 * Class CategoryRelationship
 * @package App\Models\Quiz\Category\Traits\Relationship
 */
trait CategoryRelationship
{

    /**
     * Many-to-Many relations with Role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(config('access.role'), config('access.assigned_roles_table'), 'user_id', 'role_id');
    }

    /**
     * Many-to-Many relations with Permission.
     * ONLY GETS PERMISSIONS ARE NOT ASSOCIATED WITH A ROLE
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(config('access.permission'), config('access.permission_user_table'), 'user_id', 'permission_id');
    }

    /**
     * @return mixed
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}