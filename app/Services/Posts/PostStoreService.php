<?php

namespace App\Services\Posts;

use App\Events\Posts\PostCreated;
use App\Support\Parsing\Parser;
use App\Repositiroes\Contracts\PostRepositoryInterface;

class PostStoreService
{
    protected $posts;

    public function __construct(PostRepositoryInterface $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @param $request
     * @param null $user
     * @return mixed
     */
    public function handle($request, $user = null)
    {
        $creator = $user ?: auth()->user();

        $post = $this->store($creator, $request);

        event(new PostCreated($post, $creator));

        return $post;
    }

    /**
     * @param $creator
     * @param $request
     * @return mixed
     */
    protected function store($creator, $request) {
        // convert markdown to an html code
        $request['body'] = (new Parser)->toHtml($request['body']);

        return $this->posts->storeBy($creator, $request);
    }
}
