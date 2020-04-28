<?php

namespace App\Notifications\Rates;

use App\Channels\MessagingChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class YourObjectWasRated extends Notification
{
    use Queueable;

    protected $objectTitle, $rate;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($objectTitle, $rate)
    {
        $this->objectTitle = $objectTitle;
        $this->rate = $rate;
    }

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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
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
            'text' => externalNotificationMessage('yourObjectWasRated', [
                'message' => $this->message(),
            ])
        ];
    }

    protected function payload()
    {
        return [
            'message' => $this->Message(),
            'icon' => notificationIcon('rates'),
        ];
    }
    protected function message()
    {
        return  "Your {$this->objectTitle} has got a rating {$this->rate} of " . config('site.rate_system.max_rate');
    }
}
