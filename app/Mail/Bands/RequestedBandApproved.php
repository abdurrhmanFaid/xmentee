<?php

namespace App\Mail\Bands;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
//use Illuminate\Contracts\Queue\ShouldQueue;

class RequestedBandApproved extends Mailable
{
    use Queueable, SerializesModels;

    protected $band, $ticket;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($band, $ticket)
    {
        $this->band = $band;
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.bands.approved', [
            'requestedBand' => $this->band,
            'ticket' => $this->ticket,
        ])
            ->replyTo(config('site.email'))
            ->subject('Your band has been approved!');
    }
}
