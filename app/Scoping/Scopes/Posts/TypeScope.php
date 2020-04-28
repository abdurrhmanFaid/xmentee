<?php

namespace App\Scoping\Scopes\Posts;

use App\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class TypeScope implements Scope
{
    /**
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function apply(Builder $builder, $value)
    {
        return $builder->whereIn('type', $value);
    }
}
