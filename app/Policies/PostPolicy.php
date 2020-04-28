<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        // I will not check if the user has the right to access the post
        // return $post->band()->id == $user->band_id;

        // edit: I added a band_id column in posts table for fast checking

        return $post->band_id == $user->band_id;
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $post->ownedBy($user);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }

    /**
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function storeRate(User $user, Post $post)
    {
        return !$post->ownedBy($user) && ! $post->ratedBy($user) && $this->view($user, $post);
    }

    /**
     * @param User $user
     * @param Post $post
     * @return bool
     */
    public function updateRate(User $user, Post $post)
    {
        return !$post->ownedBy($user) && $post->ratedBy($user) && $this->view($user, $post);
    }
}
