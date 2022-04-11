<?php

namespace App\Scopes;

use App\Models\TracyUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class ProjectScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  Builder  $builder
     * @param  Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {

        if (Auth::user()  === NULL) {
            return;
        }

        /**
         * @var $user TracyUser
         */
        $user = Auth::user();
        if ($user->isAdmin() === true) {
            return;
        }

        /**
         * @TODO Cache $projects
         */
        $projects = $user->getProjectIdsAttribute();

        $builder->whereIn('projekt', $projects);

    }
}
