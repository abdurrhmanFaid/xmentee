<?php

namespace App\Services\Posts;

use App\Jobs\HandlePoints;
use App\Models\Comment;
use App\Models\Rate;
use App\Repositiroes\Contracts\PostRepositoryInterface;

class PostDestroyService
{
    /**
     * @var PostRepositoryInterface
     */
    protected $posts;

    /**
     * PostDestroyService constructor.
     * @param PostRepositoryInterface $posts
     */
    public function __construct(PostRepositoryInterface $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @param $post
     */
    public function handle($post)
    {
        $this->posts->destroy($post);

        $owner = $post->owner;

        HandlePoints::dispatch('postDeleted', $owner, $owner);
    }
}
