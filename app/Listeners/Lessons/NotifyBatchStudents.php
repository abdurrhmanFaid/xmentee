<?php

namespace App\Listeners\Lessons;

use App\Events\Lessons\LessonPublished;
use App\Notifications\Lessons\LessonCreated;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyBatchStudents implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  LessonPublished  $event
     * @return void
     */
    public function handle(LessonPublished $event)
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
}
