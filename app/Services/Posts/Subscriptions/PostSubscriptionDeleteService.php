<?php

namespace App\Services\Posts\Subscriptions;

class PostSubscriptionDeleteService
{
    /**
     * @param $post
     * @param $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function handle($post, $user)
    {
        $user = $user ?: auth()->user();

        if(!$user->hasSubscribedTo($post)) {
            return response([], 422);
        }

        $user->unsubscribe($post);

        return response([], 204);
    }
}
