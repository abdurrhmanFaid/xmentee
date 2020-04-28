<?php

namespace App\Services\Posts\Comments;

use App\Jobs\HandlePoints;
use App\Models\User;
use App\Events\Posts\PostCommentCreated;

class PostCommentsStoreService
{
    /**
     * @param $post
     * @param $request
     * @param null $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function handle($post, $request, $user = null)
    {
        $user = $user ?: auth()->user();

        $comment = $post->comments()->create(
            $this->handleRequest($request, $user)
        );

        // increase or decrease points for involved user
        // That will happen only if the comment creator is not the post owner
        if(!$post->ownedBy($user)) {
            HandlePoints::dispatch('commentCreated', $user, $post->owner);
        }

        if(notificationOpen('comments')) {
            event(new PostCommentCreated($post, $comment));
        }

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
