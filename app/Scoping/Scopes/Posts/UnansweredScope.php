<?php

namespace App\Scoping\Scopes\Posts;

use App\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class UnansweredScope implements Scope
{
    /**
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function apply(Builder $builder, $value)
    {
        return $builder->whereDoesntHave('comments');
    }
}
