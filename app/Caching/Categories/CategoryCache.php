<?php

namespace App\Caching\Categories;

use App\Models\Band;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Cache;
use App\Repositiroes\Contracts\CategoryRepositoryInterface;

class CategoryCache
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $categories;

    /**
     * CategoryCache constructor.
     * @param CategoryRepositoryInterface $categories
     */
    public function __construct(CategoryRepositoryInterface $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @param $band_id
     * @return mixed
     */
    public function inBand($band_id)
    {
        return Cache::remember(
            $this->bandCategoriesCacheKey($band_id),
                CarbonInterval::week()->totalSeconds,
                function () use ($band_id) {
                    return $this->categories->inBand($band_id);
            }
        );
    }

    /**
     * @param Band $band
     */
    public function refreshBandCategories(Band $band)
    {
        Cache::forget($this->bandCategoriesCacheKey($band->id));
    }

    /**
     * @param $band_id
     * @return string
     */
    protected function bandCategoriesCacheKey($band_id)
    {
        return "band.{$band_id}.categories";
    }
}
