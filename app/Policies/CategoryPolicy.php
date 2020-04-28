<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function view(User $user, Category $category)
    {
        return $category->band_id == $user->band_id;
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->ownsAnyBand();
    }

    /**
     * @param User $user
     * @param Category $category
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
        return $category->band->hasOwner($user);
    }

    /**
     * @param User $user
     * @param Category $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return $category->band->hasOwner($user);
    }
}
