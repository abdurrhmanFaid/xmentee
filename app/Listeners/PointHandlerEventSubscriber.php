<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;

class PointHandlerEventSubscriber implements ShouldQueue
{
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Posts\PostCreated',
            'App\Listeners\PointHandlerEventSubscriber@onPostCreated'
        );
    }

    /**
     * @param $event
     */
    public function onPostCreated($event)
    {
       $event = pointsHandler('postCreated', $event->creator, $event->creator);

       if(notificationOpen('points')) {
           $event->notifyUsers();
       }
    }
}
