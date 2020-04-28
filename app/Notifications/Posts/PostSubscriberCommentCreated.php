<?php

namespace App\Notifications\Posts;

use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Channels\MessagingChannel;
use Illuminate\Notifications\Notification;

class PostSubscriberCommentCreated extends Notification
{
    use Queueable;
    protected $post, $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post, $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
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
            'id' => $notifiable->id,
            'created_at' => $notifiable->created_at->diffForHumans(),
            'data' => $this->payload(),
        ];
    }

    public function toMessaging($notifiable)
    {
        return [
            'text' => __('notifications.posts.comments.created.external.subscriber', [
                'post' => $this->post->title,
                'comment' => Str::limit(strip_tags($this->comment->body), 120),
                'link' => route('posts.show', $this->post->slug),
                'username' => $this->username(),
            ])
        ];
    }

    protected function payload()
    {
        return [
            'message' => __('notifications.posts.comments.created.internal.subscriber', [
                'username' => $this->username(),
            ]),
            'link' => route('posts.show', $this->post->slug),
        ];
    }

    protected function username()
    {
        return $this->comment->visible_user ? $this->comment->owner->name : __('comments.hidden');
    }
}
