<?php

namespace App\Notifications\Comments;

use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Channels\MessagingChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class YouWereMentioned extends Notification implements ShouldQueue
{
    use Queueable;

    protected $comment, $post;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post , $comment)
    {
        $this->comment = $comment;
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast', 'database', MessagingChannel::class];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->payload();
    }

    public function toBroadcast($notifiable)
    {
        return [
            'created_at' => $notifiable->created_at->diffForHumans(),
            'id' => $notifiable->id,
            'data' => $this->payload(),
        ];
    }

    public function toMessaging($notifiable)
    {
        return [
            'text' => __('notifications.posts.comments.created.external.mentioned', [
                'post' => $this->post->title,
                'username' => $this->username(),
                'link' => route('posts.show', $this->post->slug),
                'comment' => Str::limit(strip_tags($this->comment->body), 120),
            ])
        ];
    }

    protected function payload()
    {
        return [
            'message' => __('notifications.posts.comments.created.internal.mentioned', [
                'username' => $this->username(),
                'post' => $this->post->title,
            ]),
            'link' => route('posts.show', $this->post->slug),
            'icon' => notificationIcon('comments'),
        ];
    }

    protected function username()
    {
        return $this->comment->visible_user ? $this->comment->owner->name : __('comments.hidden');
    }
}
