<?php

namespace App\Notifications\Payments;

use App\Channels\MessagingChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentCreatedNotification extends Notification
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
        $postfix = $this->customStudentPayment['paid'] ? 'paid' : 'unpaid';

        return [
            'text' => nl2br(__("notifications.payments.created.external.{$postfix}", [
                'name' => $notifiable->name,
                'title' => $this->payment->title,
                'value' => $this->customStudentPayment['value'] . " " . $this->payment->currency,
                'description' => $this->payment->description,
                'date' => $this->customStudentPayment['paid'] ? $this->customStudentPayment['paid_at'] : $this->payment->deadline,
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
        $postfix = $this->customStudentPayment['paid'] ? 'paid' : 'unpaid';

        return __("notifications.payments.created.internal.{$postfix}", [
            'value' => "{$this->customStudentPayment['value']} {$this->payment->currency}",
            'title' => $this->payment->title,
            'date' => $this->customStudentPayment['paid'] ? $this->customStudentPayment['paid_at'] : $this->payment->deadline,
        ]);
    }
}
