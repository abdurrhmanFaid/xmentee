<?php

namespace App\Listeners\Comments;

use App\Models\User;
use App\Events\Posts\PostCommentCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Comments\YouWereMentioned;

class NotifyMentionedUsers implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  PostCommentCreated  $event
     * @return void
     */
    public function handle(PostCommentCreated $event)
    {
        preg_match_all('/@([\w]+)/', $event->comment->body, $matches);

        User::where('username', '!=' ,$event->comment->owner->username)
            ->whereIn('username', $matches[1])
            ->get()
            ->map(function ($user) use ($event) {
                $user->notify(new YouWereMentioned($event->post, $event->comment));
            });
    }
}
