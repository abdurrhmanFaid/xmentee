<?php

namespace App\Notifications\Posts;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PostCreated extends Notification
{
    use Queueable;

    protected $creator, $post;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post, $creator)
    {
        $this->post = $post;
        $this->creator = $creator;
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
            'data' => $this->payload($notifiable)
        ];
    }

    /**
     * @return array
     */
    protected function payload($notifiable)
    {
        return [
            'message' => $this->getMessage($notifiable),
            'link' => route('posts.show', $this->post->slug),
            'icon' => notificationIcon('posts'),
        ];
    }

    /**
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */
    protected function getMessage($notifiable)
    {
        return __('notifications.post_created', [
            'creator' => $this->creator->title() . " " . $this->creator->name,
            'type' => __('posts.types.' . $this->post->type),
        ]);
    }
}
