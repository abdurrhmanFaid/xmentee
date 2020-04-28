<?php

namespace App\Repositiroes\Eloquent;

use App\Models\Band;
use App\Models\Category;
use App\Repositiroes\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var Category
     */
    protected $categories;

    /**
     * TicketRepository constructor.
     * @param Ticket $tickets
     */
    public function __construct(Category $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->categories->$name(...$arguments);
    }

    /**
     * @param $bandId
     * @return mixed
     */
    public function inBand($bandId)
    {
        return $this->categories->where('band_id', $bandId)->get();
    }

    /**
     * @param $data
     */
    public function store($data)
    {
        $this->categories->create($data);
    }

    /**
     * @param $category
     * @param $data
     * @return mixed
     */
    public function update($category, $data)
    {
        return $category->update($data);
    }
}
