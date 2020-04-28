<?php

namespace App\Services\Posts;

use App\Support\Parsing\Parser;
use App\Repositiroes\Contracts\PostRepositoryInterface;

class PostUpdateService
{
    /**
     * @var PostRepositoryInterface
     */
    protected $posts;

    /**
     * PostUpdateService constructor.
     * @param PostRepositoryInterface $posts
     */
    public function __construct(PostRepositoryInterface $posts)
    {
        $this->posts = $posts;
    }


    /**
     * @param $post
     * @param $request
     * @return mixed
     */
    public function handle($post, $request)
    {
        $this->posts->update($post, $this->handleRequest($request));

        return $post->fresh();
    }

    /**
     * @param $request
     * @return mixed
     */
    protected function handleRequest($request) {
        // convert markdown to an html code
        $request['body'] = (new Parser)->toHtml($request['body']);

        return $request;
    }
}
