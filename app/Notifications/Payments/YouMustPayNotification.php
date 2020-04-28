<?php

namespace App\Notifications\Payments;

use App\Channels\MessagingChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class YouMustPayNotification extends Notification
{
    use Queueable;

    protected $payment, $customStudentPayment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($payment, $customStudentPayment)
    {
        $this->payment = $payment;
        $this->customStudentPayment = $customStudentPayment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast', 'mail', 'database', MessagingChannel::class];
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
            ->line(strip_tags($this->internalMessage()))
            ->line($this->payment->description)
            ->action('View', route('payments.show', $this->payment->slug));
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
            'data' => $this->payload()
        ];
    }


    public function toMessaging($notifiable)
    {
        return [
            'text' => nl2br(__("notifications.payments.late.external", [
                'name' => $notifiable->name,
                'title' => $this->payment->title,
                'value' => $this->customStudentPayment . " " . $this->payment->currency,
                'description' => $this->payment->description,
                'date' => $this->payment->deadline,
                'band' => $notifiable->band->name,
            ]))
        ];
    }

    protected function payload()
    {
        return [
            'message' => $this->internalMessage(),
            'icon' => notificationIcon('payments'),
            'link' => route('payments.show', $this->payment->slug),
        ];
    }

    protected function internalMessage()
    {
        return __("notifications.payments.late.internal", [
            'value' => "{$this->customStudentPayment} {$this->payment->currency}",
            'title' => $this->payment->title,
            'date' => $this->payment->deadline,
        ]);
    }
}
