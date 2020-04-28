<?php

namespace App\Listeners\Posts;

use App\Events\Posts\PostCommentCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Posts\PostSubscriberCommentCreated;

class NotifyPostSubscribers implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  PostCommentCreated  $event
     * @return void
     */
    public function handle(PostCommentCreated $event)
    {
        foreach ($event->post->subscriptions as $subscription) {
            if(!$event->comment->ownedBy($subscription->user)) {
                $subscription->user->notify(
                    new PostSubscriberCommentCreated($event->post, $event->comment)
                );
            }
        }
    }
}
