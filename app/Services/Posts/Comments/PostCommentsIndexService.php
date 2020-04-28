<?php

namespace App\Services\Posts\Comments;

use App\Models\User;

class PostCommentsIndexService
{
    /**
     * @param $post
     * @return mixed
     */
    public function handle($post)
    {
        $paginator = $post->comments()->with(['owner'])->orderBy('id', 'desc')->paginate(10);

        $paginator->getCollection()->transform(function ($comment) {
            return [
                'id' => $comment->id,
                'user_id' => $comment->user_id,
                'body' => $comment->body,
                'owner' => $comment->visible_user ? $comment->owner : $this->hiddenUser(),
                'created_at' => $comment->created_at->diffForHumans(),
            ];
        });

        return $paginator;
    }

    protected function hiddenUser()
    {
        return [
            'name' => __('comments.hidden'),
            'formattedImage' => (new User)->formattedImage(),
        ];
    }
}
