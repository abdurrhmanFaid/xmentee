<?php

namespace App\Notifications\Tickets;

use Illuminate\Bus\Queueable;
use App\Channels\MessagingChannel;
use Illuminate\Notifications\Notification;

class TicketGenerated extends Notification
{
    use Queueable;

    /**
     * @var
     */
    public $ticket;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
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
        return $this->payload($notifiable);
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toBroadcast($notifiable)
    {
        return array_merge(
            ['id' => $notifiable->id, 'created_at' => now()->diffForHumans(),],
            ['data' => $this->payload($notifiable)]
        );
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toMessaging($notifiable)
    {
        return [
            'text' => $this->message($notifiable)
        ];
    }

    /**
     * @param $notifiable
     * @return array
     */
    protected function payload($notifiable)
    {
       return [
            'message' => $this->message($notifiable),
            'link'    => route('tickets.index'),
            'icon' => notificationIcon('tickets'),
        ];
    }

    /**
     * @param $notifiable
     * @return array|string|null
     */
    protected function message($notifiable)
    {
        return __('notifications.ticket_generated', [
            'owner' => $this->ticket->owner_name
        ]);
    }
}
