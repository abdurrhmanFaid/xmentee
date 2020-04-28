<?php

namespace App\Services\Posts\Comments;

use App\Models\User;

class PostCommentsUpdateService
{
    /**
     * @param $post
     * @param $request
     * @param null $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function handle($comment, $request, $user = null)
    {
        $user = $user ?: auth()->user();

        $comment->update($this->handleRequest($request, $user));

        $comment = $comment->fresh();

        return [
            'id' => $comment->id,
            'user_id' => $comment->user_id,
            'body' => $comment->body,
            'owner' => $comment->visible_user ? $comment->owner : $this->hiddenOwner(),
            'created_at' => $comment->created_at->diffForHumans(),
        ];
    }

    /**
     * @param $request
     * @param $user
     * @return array
     */
    protected function handleRequest($request, $user)
    {
        $parser = new \Parsedown();
        // convert markdown to an html code
        $parser->setSafeMode(true);
        $parser->setMarkupEscaped(true);

        return array_merge($request, [
            'user_id' => $user->id,
            'body' => $parser->text($request['body'])
        ]);
    }

    /**
     * @return array
     */
    protected function hiddenOwner()
    {
        return [
            'name' => __('comments.hidden'),
            'formattedImage' => (new User())->formattedImage,
        ];
    }
}
