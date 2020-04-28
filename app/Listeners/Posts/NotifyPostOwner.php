<?php

namespace App\Listeners\Posts;

use App\Events\Posts\PostCommentCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Posts\PostOwnerCommentCreated as Notification;

class NotifyPostOwner implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  PostCommentCreated  $event
     * @return void
     */
    public function handle(PostCommentCreated $event)
    {
        if($event->post->ownedBy($event->comment->owner)) return;

        $event->post->owner->notify(
            new Notification($event->post, $event->comment)
        );
    }
}
