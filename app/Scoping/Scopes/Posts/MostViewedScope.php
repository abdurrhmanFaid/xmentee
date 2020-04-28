<?php

namespace App\Scoping\Scopes\Posts;

use App\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class MostViewedScope implements Scope
{
    /**
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function apply(Builder $builder, $value)
    {
        return $builder->orderBy('views_count', 'desc');
    }
}
