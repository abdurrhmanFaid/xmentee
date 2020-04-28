<?php

namespace App\Notifications\Points;

use Illuminate\Bus\Queueable;
use App\Channels\MessagingChannel;
use Illuminate\Notifications\Notification;

class PointsChanged extends Notification
{
    use Queueable;

    protected $points, $msg, $positive;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($points, $positive = true,  $msg)
    {
        $this->msg = $msg;
        $this->positive = $positive;
        $this->points = $points;
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
        return array_merge([
            'id' => $notifiable->id,
            'created_at' => $notifiable->created_at->diffForHumans(),
        ], [
            'data' => $this->payload($notifiable),
        ]);
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toMessaging($notifiable)
    {
        return [
            'text' => $this->payload($notifiable)['message'],
        ];
    }

    /**
     * @return array
     */
    protected function payload($notifiable)
    {
        return [
            'message' => $this->getMessage($notifiable),
            'points' =>  $this->points,
            'icon' => $this->positive ? notificationIcon('points_up') : notificationIcon('points_down'),
        ];
    }
    /**
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */
    protected function getMessage($notifiable)
    {
        return __($this->positive ? 'notifications.points.increased' : 'notifications.points.decreased', [
            'count' => abs($this->points),
            'reason' => $this->msg,
        ]);
    }
}
