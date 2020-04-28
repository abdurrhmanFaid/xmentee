<?php

namespace App\Notifications\Groups;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewGroupMember extends Notification
{
    use Queueable;

    protected $group;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($group)
    {
        $this->group = $group;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => __('groups.you_were_added_to_group', ['group' => $this->group->name]),
            'link' => route('groups.show', $this->group->id)
        ];
    }

    public function toBroadcasts($notifiable)
    {
        return [
            'id' => $notifiable->id,
            'created_at' => $notifiable->created_at->diffForHumans(),
            'data' =>  [
                'message' => __('groups.you_were_added_to_group', ['group' => $this->group->name]),
                'link' => route('groups.show', $this->group->id)
            ],
        ];
    }
}
