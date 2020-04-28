<?php

namespace App\Notifications\Lessons;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class LessonCreated extends Notification
{
    use Queueable;

    /**
     * @var
     */
    protected $lesson;

    /*
     * Create a new notification instance.
     *
     * @return void
     */
    /**
     * LessonCreated constructor.
     * @param $lesson
     */
    public function __construct($lesson)
    {
        $this->lesson = $lesson;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast', 'database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->payload($notifiable);
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toBroadcast($notifiable)
    {
        return [
            'id' => $notifiable->id,
            'created_at' => $notifiable->created_at->diffForHumans(),
            'data' => $this->payload($notifiable),
        ];
    }

    /**
     * @param $notifiable
     * @return array
     */
    protected function payload($notifiable)
    {
        return [
            'message' => __('lessons.created', ['lesson' => $this->lesson->title]),
            'link' => route('lessons.show', $this->lesson->slug),
        ];
    }
}
