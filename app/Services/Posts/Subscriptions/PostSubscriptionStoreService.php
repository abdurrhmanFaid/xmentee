<?php

namespace App\Services\Posts\Subscriptions;

class PostSubscriptionStoreService
{
    /**
     * @param $post
     * @param null $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function handle($post, $user = null)
    {
        $user = $user ?: auth()->user();

        if($user->hasSubscribedTo($post) || $post->ownedBy($user)) {
            return response([], 422);
        }

        $user->subscribe($post);

        return response([
            'message' => __('posts.subscriptions.subscribed')
        ], 201);
    }
}
