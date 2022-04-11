<?php

namespace App\Scopes;

use App\Models\TracyUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class ItemDeletedScope implements Scope
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

        // SELECT * FOM artikel WHERE nummer NOT LIKE "DEL"
        $builder->where('nummer' , '!=' ,'DEL');

    }
}
