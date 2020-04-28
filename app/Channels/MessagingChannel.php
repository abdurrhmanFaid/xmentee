<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;

class MessagingChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toMessaging($notifiable);

        if($notifiable->messagingId()) {
            sendExternalMessage('message', $notifiable->messagingId(), $message);
        }
    }
}
