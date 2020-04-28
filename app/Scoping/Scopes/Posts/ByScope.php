<?php

namespace App\Scoping\Scopes\Posts;

use App\Models\User;
use App\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class ByScope implements Scope
{
    /**
     * @param Builder $builder
     * @param $username
     * @return Builder
     */
    public function apply(Builder $builder, $username)
    {
        if(!$username || $username == 'null') return $builder;

        return $builder->whereHas('owner', function ($query) use ($username) {
            return $query->where('username', $username);
        });
    }
}
