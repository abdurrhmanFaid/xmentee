<?php

namespace App\Listeners;

use App\Notifications\Lessons\LessonCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Posts\PostCreated as PostCreatedNotification;

class NotifyBatchStudents implements ShouldQueue
{
    /**
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Lessons\LessonPublished',
            'App\Listeners\NotifyBatchStudents@onLessonPublished'
        );
        $events->listen(
            'App\Events\Posts\PostCreated',
            'App\Listeners\NotifyBatchStudents@onPostCreated'
        );
    }

    /**
     * @param $event
     */
    public function onLessonPublished($event)
    {
        $event->lesson->batchStudents()->each(function ($student) use ($event) {
            $student->notify(new LessonCreated($event->lesson));
        });

        sendExternalMessage('message', $event->band->getMessagingGroupId(), [
            'text' => __('notifications.lesson_created', [
                'band' => $event->band->name,
                'title' => $event->lesson->title,
                'link' => route('lessons.show', $event->lesson->slug),
            ], $event->band->notificationsLocale()),
        ]);
    }

    /**
     * @param $event
     */
    public function onPostCreated($event)
    {
        if(notificationOpen('posts')) {
            /**
             * Get users to notify
             * If creator is instructor > notify all band students
             * It creator is student    > notify students of poster batch only
             */
            $users = $event->creator->isStudent() ? $event->creator->batchStudents() : $event->creator->bandStudents();

            $users->map(function ($user) use ($event) {
                $user->notify(new PostCreatedNotification($event->post, $event->creator));
            })->filter(function ($user) use ($event) {
                return $user !== $event->creator->id;
            });


            $messaging = $event->creator->bandMessaging();

            /**
             * Send message to the band messaging group
             */
            sendExternalMessage('message', $messaging['groupId'], [
                'text' => __('notifications.messaging.post_created', [
                    'title' => $event->post->title,
                    'link' => route('posts.show', $event->post->slug),
                    'creator' => $event->creator->title($messaging['locale']) . " " . $event->creator->name,
                    'type' => __('posts.types.' . $event->post->type, [], $messaging['locale'])
                ], $messaging['locale'])
            ]);
        }

        return;
    }
}
