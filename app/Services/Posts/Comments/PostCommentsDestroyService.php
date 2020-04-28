<?php

namespace App\Services\Posts\Comments;

use App\Jobs\HandlePoints;

class PostCommentsDestroyService
{

    /**
     * @param $post
     * @param $comment
     */
    public function handle($post, $comment)
    {
        $owner = auth()->user(); // $comment->owner

        if(!$post->ownedBy($owner)) {
            HandlePoints::dispatch('commentDeleted', $owner, $owner);
        }

        $comment->delete();
    }
}
