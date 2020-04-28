<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessagingLinkedNotification implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels;

    protected $messagingId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($messagingId)
    {
        $this->messagingId = $messagingId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sendExternalMessage('message', $this->messagingId, [
            'text' => __('js.user.messaging_linked'),
        ]);
    }
}
