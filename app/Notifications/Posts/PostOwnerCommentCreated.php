<?php

namespace App\Notifications\Posts;

use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use App\Channels\MessagingChannel;
use Illuminate\Notifications\Notification;

class PostOwnerCommentCreated extends Notification
{
    use Queueable;

    protected $post, $comment, $doer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post,  $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
        $this->doer = $comment->owner;
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

    /**
     * @param $notifiable
     * @return array
     */
    public function toBroadcast($notifiable)
    {
        return [
            'data' => $this->payload(),
            'id' => $notifiable->id,
            'created_at' => $notifiable->created_at->diffForHumans(),
        ];
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toMessaging($notifiable)
    {
        return [
            'text' => __('notifications.posts.comments.created.external.objectOwner', [
                'username' => $this->username(),
                'post' => $this->post->title,
                'comment' => Str::limit(strip_tags($this->comment->body), 150),
                'link' => route('posts.show', $this->post->slug),
            ]),
        ];
    }

    /**
     * @return array
     */
    protected function payload()
    {
        return [
            'message' => __('notifications.posts.comments.created.internal.objectOwner', [
                'username' => $this->username(),
                'post' => $this->post->title
            ]),
            'link' => route('posts.show', $this->post->slug),
            'icon' => notificationIcon('comments')
        ];
    }

    /**
     * @return array|string|null
     */
    protected function username()
    {
        return  $this->comment->visible_user ? $this->doer->name : __('comments.hidden');
    }
}
