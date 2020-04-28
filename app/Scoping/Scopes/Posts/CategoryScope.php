<?php

namespace App\Scoping\Scopes\Posts;

use App\Models\Category;
use App\Scoping\Contracts\Scope;
use Illuminate\Database\Eloquent\Builder;

class CategoryScope implements Scope
{
    /**
     * @param Builder $builder
     * @param $value
     * @return Builder
     */
    public function apply(Builder $builder, $value)
    {
        return $builder->whereIn('category_id', $value);
    }
}
