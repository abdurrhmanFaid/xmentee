<?php

namespace App\Observers;

use App\Caching\Categories\CategoryCache;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    protected $categoryCache;

    public function __construct(CategoryCache $categoryCache)
    {
        $this->categoryCache = $categoryCache;
    }

    /**
     * @param Category $category
     */
    public function creating(Category $category)
    {
        if (! $user = auth()->user()) {
            $category->slug = Str::slug($category->name);
            return;
        }

        $category->slug = $user->band->slug . '-' . Str::slug($category->name);
    }

    /**
     * Handle the category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        $this->categoryCache->refreshBandCategories($category->band);
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        $this->categoryCache->refreshBandCategories($category->band);
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        $this->categoryCache->refreshBandCategories($category->band);
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
